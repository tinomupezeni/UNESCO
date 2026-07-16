<?php

namespace App\Filament\Resources\ProgrammeResource\Pages;

use App\Filament\Resources\ProgrammeResource;
use Filament\Actions\DeleteAction;
use App\Filament\Resources\Pages\BaseEditRecord;

class EditProgramme extends BaseEditRecord
{
    protected static string $resource = ProgrammeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
