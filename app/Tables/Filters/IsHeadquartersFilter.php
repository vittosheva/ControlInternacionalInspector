<?php

namespace App\Tables\Filters;

use Filament\Tables\Filters\SelectFilter;

class IsHeadquartersFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Headquarters'))
            ->options([
                '1' => __('Yes'),
                '0' => __('No'),
            ])
            ->multiple();
    }
}
