<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublicationResource\Pages;
use App\Models\Publication;
use BackedEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use UnitEnum;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Resources\Resource;

class PublicationResource extends Resource
{
    protected static ?string $model = Publication::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBookOpen;

    protected static string|UnitEnum|null $navigationGroup = 'Publications';

    protected static ?int $navigationSort = 1;

    protected static array $translatableAttributes = ['title', 'description'];

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
                                    'title' => TextInput::make("{$attr}_{$locale}")
                                        ->label($locale === 'fr' ? 'Titre' : ucfirst($attr))
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
                        TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->maxLength(255),
                        TextInput::make('author')
                            ->maxLength(255),
                        DatePicker::make('publication_date'),
                        Select::make('category')
                            ->options([
                                'report' => 'Report',
                                'newsletter' => 'Newsletter',
                                'handbook' => 'Handbook',
                                'policy' => 'Policy',
                            ]),
                        TextInput::make('isbn')
                            ->maxLength(255)
                            ->helperText('ISBN number'),
                        TextInput::make('pages')
                            ->numeric()
                            ->helperText('Number of pages'),
                        FileUpload::make('cover_image')
                            ->image()
                            ->helperText('Cover image'),
                        FileUpload::make('file_path')
                            ->helperText('PDF or document file'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('author')
                    ->searchable(),
                TextColumn::make('publication_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('category')
                    ->badge(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPublications::route('/'),
            'create' => Pages\CreatePublication::route('/create'),
            'edit' => Pages\EditPublication::route('/{record}/edit'),
        ];
    }
}
