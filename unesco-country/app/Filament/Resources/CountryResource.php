<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CountryResource\Pages;
use App\Filament\Resources\CountryResource\RelationManagers\DesignationsRelationManager;
use App\Models\Country;
use BackedEnum;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class CountryResource extends Resource
{
    protected static ?string $model = Country::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGlobeAlt;

    protected static string|UnitEnum|null $navigationGroup = 'Reference';

    protected static ?int $navigationSort = 1;

    protected static array $translatableAttributes = ['name', 'description'];

    protected static array $locales = ['en', 'fr'];

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Content')
                    ->tabs(array_map(
                        fn (string $locale) => Tabs\Tab::make(ucfirst($locale))
                            ->icon('heroicon-o-language')
                            ->schema(array_map(
                                fn (string $attr) => match ($attr) {
                                    'name' => TextInput::make("{$attr}_{$locale}")
                                        ->label($locale === 'fr' ? 'Nom' : ucfirst($attr))
                                        ->required($locale === 'en')
                                        ->maxLength(255),
                                    default => Textarea::make("{$attr}_{$locale}")
                                        ->label(ucfirst($attr))
                                        ->rows(3)
                                        ->columnSpanFull(),
                                },
                                static::$translatableAttributes,
                            )),
                        static::$locales,
                    ))
                    ->columnSpanFull(),

                Section::make('Details')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        TextInput::make('code')
                            ->required()
                            ->maxLength(10)
                            ->unique(ignoreRecord: true)
                            ->helperText('ISO 3166-1 alpha-2 (e.g. ZW)'),
                        TextInput::make('profile_url')
                            ->maxLength(255)
                            ->helperText('Profile page URL'),
                        TextInput::make('data_url')
                            ->maxLength(255)
                            ->helperText('Data endpoint URL'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable()
                    ->badge(),
                Tables\Columns\TextColumn::make('profile_url')
                    ->limit(30)
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('designations_count')
                    ->counts('designations')
                    ->sortable()
                    ->label('Designations'),
            ])
            ->defaultSort('name')
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            DesignationsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCountries::route('/'),
            'create' => Pages\CreateCountry::route('/create'),
            'edit' => Pages\EditCountry::route('/{record}/edit'),
        ];
    }
}
