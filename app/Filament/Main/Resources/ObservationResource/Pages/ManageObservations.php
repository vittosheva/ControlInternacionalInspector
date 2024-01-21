<?php

namespace App\Filament\Main\Resources\ObservationResource\Pages;

use App\Filament\Main\Resources\ObservationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Filament\Support\Enums\MaxWidth;

class ManageObservations extends ManageRecords
{
    protected static string $resource = ObservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth(MaxWidth::ExtraLarge)
                ->slideOver(),
        ];
    }
}
