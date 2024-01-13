<?php

namespace App\Filament\SuperAdmin\Resources\RoleResource\Pages;

use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource\Pages\EditRole as BaseEditRole;
use App\Filament\SuperAdmin\Resources\RoleResource;

class EditRole extends BaseEditRole
{
    protected static string $resource = RoleResource::class;
}
