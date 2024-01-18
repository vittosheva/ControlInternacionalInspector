<?php

namespace App\Filament\Main\Resources\BathroomComplianceObservationResource\Pages;

use App\Filament\Main\Resources\BathroomComplianceObservationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageBathroomComplianceObservations extends ManageRecords
{
    protected static string $resource = BathroomComplianceObservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->slideOver(),
        ];
    }
}
