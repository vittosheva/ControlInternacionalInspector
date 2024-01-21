<?php

namespace App\Filament\Main\Resources\EnvironmentalObservationResource\Pages;

use App\Filament\Main\Resources\EnvironmentalObservationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Filament\Support\Enums\MaxWidth;

class ManageEnvironmentalObservations extends ManageRecords
{
    protected static string $resource = EnvironmentalObservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth(MaxWidth::ExtraLarge)
                ->slideOver(),
        ];
    }
}
