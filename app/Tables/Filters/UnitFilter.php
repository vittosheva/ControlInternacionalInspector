<?php

namespace App\Tables\Filters;

use App\Models\Setting\Unit;
use Filament\Tables\Filters\SelectFilter;

class UnitFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Unit'))
            ->options(Unit::oldest('name')->pluck('name', 'code'))
            ->multiple();
    }
}
