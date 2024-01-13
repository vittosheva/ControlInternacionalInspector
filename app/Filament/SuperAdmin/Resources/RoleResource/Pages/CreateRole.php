<?php

namespace App\Filament\SuperAdmin\Resources\RoleResource\Pages;

use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource\Pages\CreateRole as BaseCreateRole;
use App\Filament\SuperAdmin\Resources\RoleResource;

class CreateRole extends BaseCreateRole
{
    protected static string $resource = RoleResource::class;
}
