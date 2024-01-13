<?php

namespace App\Tables\Filters;

use App\Models\Persona\User;
use Filament\Tables\Filters\SelectFilter;

class ManagerFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Manager'))
            ->options(User::oldest('name')->pluck('name', 'id')->toArray())
            ->multiple();
    }
}
