<?php

namespace App\Filament\SuperAdmin\Resources\PermissionResource\Pages;

use Althinect\FilamentSpatieRolesPermissions\Resources\PermissionResource\Pages\CreatePermission as BaseCreatePermission;
use App\Filament\SuperAdmin\Resources\PermissionResource;

class CreatePermission extends BaseCreatePermission
{
    protected static string $resource = PermissionResource::class;
}
