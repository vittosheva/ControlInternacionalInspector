<?php

namespace App\Filament\SuperAdmin\Resources\EmployeeResource\Pages;

use App\Filament\SuperAdmin\Resources\EmployeeResource;
use Filament\Actions\CreateAction;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Filament\Resources\Pages\ListRecords;

class ListEmployees extends ListRecords
{
    use ExposesTableToWidgets;

    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            //EmployeeResource\Widgets\EmployeeStatsOverview::class,
        ];
    }
}
