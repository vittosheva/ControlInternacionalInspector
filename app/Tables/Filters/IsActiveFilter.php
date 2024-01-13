<?php

namespace App\Tables\Filters;

use Filament\Tables\Filters\SelectFilter;

class IsActiveFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Is Active?'))
            ->options([
                '1' => __('Yes'),
                '0' => __('No'),
            ])
            ->multiple();
    }
}
