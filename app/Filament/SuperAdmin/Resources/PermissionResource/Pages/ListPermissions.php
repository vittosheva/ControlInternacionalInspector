<?php

namespace App\Filament\SuperAdmin\Resources\PermissionResource\Pages;

use Althinect\FilamentSpatieRolesPermissions\Resources\PermissionResource\Pages\ListPermissions as BaseListPermissions;
use App\Filament\SuperAdmin\Resources\PermissionResource;

class ListPermissions extends BaseListPermissions
{
    protected static string $resource = PermissionResource::class;
}
