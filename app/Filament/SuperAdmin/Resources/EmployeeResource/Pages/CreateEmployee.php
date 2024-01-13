<?php

namespace App\Filament\SuperAdmin\Resources\EmployeeResource\Pages;

use App\Filament\SuperAdmin\Resources\EmployeeResource;
use App\Packages\Filament\CreateRecordTrait;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployee extends CreateRecord
{
    use CreateRecordTrait;

    protected static string $resource = EmployeeResource::class;
}
