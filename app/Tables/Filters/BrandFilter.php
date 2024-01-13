<?php

namespace App\Tables\Filters;

use App\Models\Inventory\Brand;
use Filament\Tables\Filters\SelectFilter;

class BrandFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Brand'))
            ->options(Brand::oldest('name')->pluck('name', 'id')->toArray())
            ->multiple();
    }
}
