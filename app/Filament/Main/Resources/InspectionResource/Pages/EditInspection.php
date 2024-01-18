<?php

namespace App\Filament\Main\Resources\InspectionResource\Pages;

use App\Actions\Filament\GeneratePdfAction;
use App\Actions\Filament\ViewPdfAction;
use App\Filament\Main\Resources\InspectionResource;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditInspection extends EditRecord
{
    protected static string $resource = InspectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ActionGroup::make([
                GeneratePdfAction::make(),
                ViewPdfAction::make(),
            ]),
            DeleteAction::make(),
        ];
    }
}
