<?php

namespace App\Filament\Resources\CountryResource\RelationManagers;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\RelationManagers\RelationManager;

class DesignationsRelationManager extends RelationManager
{
    protected static string $relationship = 'designations';

    protected static ?string $title = 'Designations';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
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
                    ->rows(2),
                TextInput::make('external_url')
                    ->maxLength(255)
                    ->helperText('Link to external site'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
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
            ->defaultSort('name')
            ->filters([
                //
            ]);
    }
}
