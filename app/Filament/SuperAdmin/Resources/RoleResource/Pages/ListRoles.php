<?php

namespace App\Filament\SuperAdmin\Resources\RoleResource\Pages;

use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource\Pages\ListRoles as BaseListRoles;
use App\Filament\SuperAdmin\Resources\RoleResource;

class ListRoles extends BaseListRoles
{
    protected static string $resource = RoleResource::class;
}
