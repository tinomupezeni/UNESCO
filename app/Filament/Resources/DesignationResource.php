<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DesignationResource\Pages;
use App\Models\Designation;
use BackedEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use UnitEnum;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;

class DesignationResource extends Resource
{
    protected static ?string $model = Designation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMapPin;

    protected static string|UnitEnum|null $navigationGroup = 'Reference';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('country_id')
                    ->relationship('country', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('type')
                    ->options([
                        'world_heritage' => 'World Heritage Site',
                        'biosphere_reserve' => 'Biosphere Reserve',
                        'creative_city' => 'Creative City',
                        'intangible_heritage' => 'Intangible Heritage',
                        'memory_of_world' => 'Memory of the World',
                    ])
                    ->required(),
                Textarea::make('description')
                    ->rows(3)
                    ->columnSpanFull(),
                TextInput::make('external_url')
                    ->maxLength(255)
                    ->helperText('Link to external site'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('country.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'world_heritage' => 'World Heritage Site',
                        'biosphere_reserve' => 'Biosphere Reserve',
                        'creative_city' => 'Creative City',
                        'intangible_heritage' => 'Intangible Heritage',
                        'memory_of_world' => 'Memory of the World',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'world_heritage' => 'success',
                        'biosphere_reserve' => 'info',
                        'creative_city' => 'warning',
                        'intangible_heritage' => 'danger',
                        'memory_of_world' => 'gray',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('external_url')
                    ->limit(30)
                    ->placeholder('—'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'world_heritage' => 'World Heritage Site',
                        'biosphere_reserve' => 'Biosphere Reserve',
                        'creative_city' => 'Creative City',
                        'intangible_heritage' => 'Intangible Heritage',
                        'memory_of_world' => 'Memory of the World',
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
            'index' => Pages\ListDesignations::route('/'),
            'create' => Pages\CreateDesignation::route('/create'),
            'edit' => Pages\EditDesignation::route('/{record}/edit'),
        ];
    }
}
