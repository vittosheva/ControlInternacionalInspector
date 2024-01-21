<?php

namespace App\Filament\Main\Resources\InspectionSettingResource\Pages;

use App\Filament\Main\Resources\InspectionSettingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Filament\Support\Enums\MaxWidth;

class ManageInspectionSettings extends ManageRecords
{
    protected static string $resource = InspectionSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth(MaxWidth::ThreeExtraLarge)
                ->slideOver(),
        ];
    }
}
