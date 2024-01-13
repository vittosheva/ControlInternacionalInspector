<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Illuminate\Database\Eloquent\Builder;

class RoleSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('filament-spatie-roles-permissions::filament-spatie.field.roles'))
            ->prefixIcon('heroicon-m-finger-print')
            ->relationship('roles', 'name', fn (Builder $query, Get $get) => $query
                //->select(['id', 'name'])
                ->where('name', '<>', 'Super Admin')
                ->orderBy('name')
            )
            ->preload(config('filament-spatie-roles-permissions.preload_roles', true))
            ->multiple(false)
            ->searchable();
    }
}
