<?php

namespace App\Filament\SuperAdmin\Resources\DepartmentResource\Pages;

use App\Filament\SuperAdmin\Resources\DepartmentResource;
use App\Packages\Filament\EditRecordTrait;
use Filament\Resources\Pages\EditRecord;
use Kenepa\ResourceLock\Resources\Pages\Concerns\UsesResourceLock;

class EditDepartment extends EditRecord
{
    use EditRecordTrait;
    use UsesResourceLock;

    protected static string $resource = DepartmentResource::class;
}
