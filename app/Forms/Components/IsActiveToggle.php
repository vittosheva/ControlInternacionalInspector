<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Toggle;

class IsActiveToggle extends Toggle
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Is Active?'))
            ->onColor('success')
            ->inline()
            ->default(fn ($record): int => (! empty($record) && $record->is_active) ? $record->is_active : 1);
    }
}
