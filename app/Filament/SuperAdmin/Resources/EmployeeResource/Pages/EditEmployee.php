<?php

namespace App\Filament\SuperAdmin\Resources\EmployeeResource\Pages;

use App\Filament\SuperAdmin\Resources\EmployeeResource;
use App\Packages\Filament\EditRecordTrait;
use Filament\Resources\Pages\EditRecord;
use Kenepa\ResourceLock\Resources\Pages\Concerns\UsesResourceLock;

class EditEmployee extends EditRecord
{
    use EditRecordTrait;
    use UsesResourceLock;

    protected static string $resource = EmployeeResource::class;
}
