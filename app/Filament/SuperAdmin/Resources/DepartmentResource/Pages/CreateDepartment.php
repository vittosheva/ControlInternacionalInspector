<?php

namespace App\Filament\SuperAdmin\Resources\DepartmentResource\Pages;

use App\Filament\SuperAdmin\Resources\DepartmentResource;
use App\Packages\Filament\CreateRecordTrait;
use Filament\Resources\Pages\CreateRecord;

class CreateDepartment extends CreateRecord
{
    use CreateRecordTrait;

    protected static string $resource = DepartmentResource::class;
}
