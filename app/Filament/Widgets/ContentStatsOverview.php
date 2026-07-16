<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Event;
use App\Models\Programme;
use App\Models\Publication;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContentStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Articles', Article::count())
                ->description('Published: ' . Article::where('status', 'published')->count())
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('success'),
            Stat::make('Upcoming Events', Event::where('event_date', '>=', now())->count())
                ->description('Draft: ' . Event::where('status', 'draft')->count())
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('info'),
            Stat::make('Active Programmes', Programme::where('status', 'active')->count())
                ->description('Total: ' . Programme::count())
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('warning'),
            Stat::make('Publications', Publication::count())
                ->description('This year: ' . Publication::whereYear('publication_date', now()->year)->count())
                ->descriptionIcon('heroicon-m-book-open')
                ->color('primary'),
        ];
    }
}
