<?php

namespace App\Filament\Widgets;

use Filament\Actions\Action;
use Filament\Widgets\Widget;

class QuickActions extends Widget
{
    protected static ?string $heading = 'Quick Actions';
    protected static ?int $sort = 3;
    protected string $view = 'filament.widgets.quick-actions';
}
