<?php

namespace App\Filament\Main\Resources\ControlResource\Pages;

use App\Actions\Filament\GeneratePdfAction;
use App\Filament\Main\Resources\ControlResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewControl extends ViewRecord
{
    protected static string $resource = ControlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()->visible(auth()->user()->isAdmin()),
            GeneratePdfAction::make(),
        ];
    }
}
