<?php

namespace App\Filament\Main\Resources\GasStationObservationResource\Pages;

use App\Filament\Main\Resources\GasStationObservationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Filament\Support\Enums\MaxWidth;

class ManageGasStationObservations extends ManageRecords
{
    protected static string $resource = GasStationObservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth(MaxWidth::ExtraLarge)
                ->slideOver(),
        ];
    }
}
