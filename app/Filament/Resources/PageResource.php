<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use BackedEnum;
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

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 1;

    protected static array $translatableAttributes = ['title', 'content'];

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
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'published' => 'Published',
                                'draft' => 'Draft',
                            ])
                            ->required(),
                        Select::make('template')
                            ->options([
                                'default' => 'Default',
                                'full-width' => 'Full Width',
                                'two-column' => 'Two Column',
                            ])
                            ->default('default'),
                        TextInput::make('meta_title')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        TextInput::make('meta_description')
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
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('template')
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
