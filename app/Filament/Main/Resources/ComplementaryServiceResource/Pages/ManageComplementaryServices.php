<?php

namespace App\Filament\Main\Resources\ComplementaryServiceResource\Pages;

use App\Filament\Main\Resources\ComplementaryServiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageComplementaryServices extends ManageRecords
{
    protected static string $resource = ComplementaryServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->slideOver(),
        ];
    }
}
