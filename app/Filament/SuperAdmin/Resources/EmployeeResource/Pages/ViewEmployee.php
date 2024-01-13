<?php

namespace App\Filament\SuperAdmin\Resources\EmployeeResource\Pages;

use App\Filament\SuperAdmin\Resources\EmployeeResource;
use App\Packages\Filament\ViewRecordTrait;
use Filament\Resources\Pages\ViewRecord;

class ViewEmployee extends ViewRecord
{
    use ViewRecordTrait;

    protected static string $resource = EmployeeResource::class;
}
