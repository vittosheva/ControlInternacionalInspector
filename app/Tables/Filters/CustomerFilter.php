<?php

namespace App\Tables\Filters;

use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class CustomerFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Customer'))
            ->relationship('customer', 'business_name', fn (Builder $query) => $query
                ->select(['id', 'customer_id', 'business_name'])
                ->orderBy('business_name')
            )
            ->multiple()
            ->native(false);
    }
}
