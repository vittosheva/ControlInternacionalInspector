<?php

namespace App\Filament\Main\Resources\InspectionResource\Pages;

use App\Actions\Filament\GeneratePdfAction;
use App\Actions\Filament\GoBackAction;
use App\Filament\Main\Resources\InspectionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewInspection extends ViewRecord
{
    protected static string $resource = InspectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            GoBackAction::make()
                ->url(InspectionResource::getUrl()),
            EditAction::make()
                ->visible(auth()->user()->isAdmin()),
            GeneratePdfAction::make()
                ->visible(auth()->user()->isAdmin()),
        ];
    }
}
