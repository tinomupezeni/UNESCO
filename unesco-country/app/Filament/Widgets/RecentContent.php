<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Event;
use App\Models\Publication;
use Filament\Widgets\Widget;

class RecentContent extends Widget
{
    protected static ?string $heading = 'Recent Content';
    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = 'full';

    protected string $view = 'filament.widgets.recent-content';

    public function getRecords(): array
    {
        $articles = Article::query()->latest('updated_at')->limit(5)->get()->map(fn ($item) => [
            'title' => $item->title,
            'type' => 'Article',
            'status' => $item->status,
            'updated_at' => $item->updated_at,
            'url' => \App\Filament\Resources\ArticleResource::getUrl('edit', ['record' => $item]),
        ]);

        $events = Event::query()->latest('updated_at')->limit(5)->get()->map(fn ($item) => [
            'title' => $item->title,
            'type' => 'Event',
            'status' => $item->status,
            'updated_at' => $item->updated_at,
            'url' => \App\Filament\Resources\EventResource::getUrl('edit', ['record' => $item]),
        ]);

        $publications = Publication::query()->latest('updated_at')->limit(5)->get()->map(fn ($item) => [
            'title' => $item->title,
            'type' => 'Publication',
            'status' => $item->status,
            'updated_at' => $item->updated_at,
            'url' => \App\Filament\Resources\PublicationResource::getUrl('edit', ['record' => $item]),
        ]);

        return $articles->concat($events)->concat($publications)
            ->sortByDesc('updated_at')
            ->values()
            ->toArray();
    }
}
