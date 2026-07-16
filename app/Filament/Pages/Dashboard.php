<?php

namespace App\Filament\Pages;

use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use App\Filament\Widgets\ContentStatsOverview;
use App\Filament\Widgets\RecentContent;
use App\Filament\Widgets\QuickActions;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public static function getNavigationLabel(): string
    {
        return 'Dashboard';
    }

    public function getWidgets(): array
    {
        return [
            ContentStatsOverview::class,
            RecentContent::class,
            QuickActions::class,
            AccountWidget::class,
        ];
    }
}
