<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Toggle;

class HasCommissionToggle extends Toggle
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Has Commission'))
            ->onColor('primary')
            ->default(fn ($record): int => (! empty($record) && $record->is_active) ? $record->is_active : 0);
    }
}
