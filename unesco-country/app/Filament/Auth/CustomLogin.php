<?php

namespace App\Filament\Auth;

use Filament\Auth\Pages\Login;
use Illuminate\Contracts\Support\Htmlable;

class CustomLogin extends Login
{
    protected string $view = 'filament.auth.login';

    public function getLayout(): string
    {
        return 'filament-panels::components.layout.base';
    }

    protected function getLayoutData(): array
    {
        return [];
    }

    public function getHeading(): string|Htmlable|null
    {
        if (filled($this->userUndertakingMultiFactorAuthentication)) {
            return parent::getHeading();
        }

        return null;
    }

    public function getSubheading(): string|Htmlable|null
    {
        if (filled($this->userUndertakingMultiFactorAuthentication)) {
            return parent::getSubheading();
        }

        return null;
    }

    public function hasLogo(): bool
    {
        return false;
    }
}
