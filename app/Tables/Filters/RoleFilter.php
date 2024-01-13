<?php

namespace App\Tables\Filters;

use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class RoleFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Role'))
            ->relationship('roles', 'name', fn (Builder $query) => $query->select(['id', 'name'])
            );
    }
}
