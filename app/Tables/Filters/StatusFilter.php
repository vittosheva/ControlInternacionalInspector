<?php

namespace App\Tables\Filters;

use Filament\Tables\Filters\SelectFilter;

class StatusFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Status'))
            ->options([])
            ->multiple()
            ->native(false);
    }
}
