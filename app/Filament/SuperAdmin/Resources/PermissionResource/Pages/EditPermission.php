<?php

namespace App\Filament\SuperAdmin\Resources\PermissionResource\Pages;

use Althinect\FilamentSpatieRolesPermissions\Resources\PermissionResource\Pages\EditPermission as BaseEditPermission;
use App\Filament\SuperAdmin\Resources\PermissionResource;

class EditPermission extends BaseEditPermission
{
    protected static string $resource = PermissionResource::class;
}
