<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use BackedEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use UnitEnum;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Resources\Resource;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedNewspaper;

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 2;

    protected static array $translatableAttributes = ['title', 'excerpt', 'content'];

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
                                    'excerpt' => Textarea::make("{$attr}_{$locale}")
                                        ->label('Excerpt')
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
                        Select::make('category')
                            ->options([
                                'news' => 'News',
                                'story' => 'Story',
                                'press_release' => 'Press Release',
                            ])
                            ->searchable(),
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'published' => 'Published',
                                'draft' => 'Draft',
                            ])
                            ->required(),
                        DatePicker::make('published_at'),
                        TextInput::make('sdg_alignment')
                            ->maxLength(255)
                            ->helperText('SDG alignment (e.g. 4, 13)')
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
                TextColumn::make('category')
                    ->badge(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
