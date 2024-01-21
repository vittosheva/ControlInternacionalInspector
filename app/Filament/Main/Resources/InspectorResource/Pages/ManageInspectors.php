<?php

namespace App\Filament\Main\Resources\InspectorResource\Pages;

use App\Filament\Main\Resources\InspectorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Filament\Support\Enums\MaxWidth;

class ManageInspectors extends ManageRecords
{
    protected static string $resource = InspectorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth(MaxWidth::ExtraLarge)
                ->slideOver(),
        ];
    }
}
