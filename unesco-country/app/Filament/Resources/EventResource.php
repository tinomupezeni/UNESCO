<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use BackedEnum;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use UnitEnum;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Resources\Resource;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    protected static string|UnitEnum|null $navigationGroup = 'Events';

    protected static ?int $navigationSort = 1;

    protected static array $translatableAttributes = ['title', 'description', 'content'];

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
                                    'description' => Textarea::make("{$attr}_{$locale}")
                                        ->label('Description')
                                        ->rows(3)
                                        ->columnSpanFull(),
                                    default => RichEditor::make("{$attr}_{$locale}")
                                        ->label(ucfirst($attr))
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
                        TextInput::make('location')
                            ->maxLength(255),
                        DateTimePicker::make('event_date')
                            ->required(),
                        DateTimePicker::make('event_end_date'),
                        Select::make('event_type')
                            ->label('Event Type')
                            ->options([
                                'conference' => 'Conference',
                                'workshop' => 'Workshop',
                                'webinar' => 'Webinar',
                                'meeting' => 'Meeting',
                            ]),
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'upcoming' => 'Upcoming',
                                'ongoing' => 'Ongoing',
                                'past' => 'Past',
                            ])
                            ->required(),
                        TextInput::make('registration_url')
                            ->maxLength(255)
                            ->columnSpanFull(),
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
                TextColumn::make('location')
                    ->searchable(),
                TextColumn::make('event_date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('event_end_date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge(),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
