<?php

namespace App\Filament\SuperAdmin\Resources\PermissionResource\Pages;

use Althinect\FilamentSpatieRolesPermissions\Resources\PermissionResource\Pages\ViewPermission as BaseViewPermission;
use App\Filament\SuperAdmin\Resources\PermissionResource;

class ViewPermission extends BaseViewPermission
{
    protected static string $resource = PermissionResource::class;
}
