<?php

namespace App\Tables\Filters;

use App\Models\Persona\User;
use App\Models\Scopes\CompanyScope;
use App\Models\Scopes\IsNotSuperScope;
use Filament\Tables\Filters\SelectFilter;

class EmployeeFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Salesperson'))
            ->options(User::query()
                ->withoutTrashed()
                ->withGlobalScope('company_id', new CompanyScope())
                ->withGlobalScope('is_not_super', new IsNotSuperScope())
                ->pluck('name', 'id')
                ->toArray()
            )
            ->native(false)
            ->searchable();
    }
}
