<?php

namespace App\Tables\Filters;

use Filament\Tables\Filters\SelectFilter;

class IsAllowedToLoginFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Is Allowed To Login?'))
            ->options([
                '1' => __('Yes'),
                '0' => __('No'),
            ])
            ->multiple();
    }
}
