<?php

namespace App\Tables\Filters;

use App\Models\Tax\Tax;
use Filament\Tables\Filters\SelectFilter;

class TaxFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Tax'))
            ->options(Tax::taxesGrouped())
            ->multiple();
    }
}
