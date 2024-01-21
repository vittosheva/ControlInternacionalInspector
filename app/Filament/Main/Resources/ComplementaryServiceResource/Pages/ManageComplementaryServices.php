<?php

namespace App\Filament\Main\Resources\ComplementaryServiceResource\Pages;

use App\Filament\Main\Resources\ComplementaryServiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Filament\Support\Enums\MaxWidth;

class ManageComplementaryServices extends ManageRecords
{
    protected static string $resource = ComplementaryServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth(MaxWidth::ExtraLarge)
                ->slideOver(),
        ];
    }
}
