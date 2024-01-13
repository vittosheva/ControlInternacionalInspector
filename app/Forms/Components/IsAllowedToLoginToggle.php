<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Toggle;

class IsAllowedToLoginToggle extends Toggle
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Is Allowed To Login?'))
            ->inline()
            ->default(fn ($record): int => ! empty($record) && $record->is_allowed_to_login ? $record->is_allowed_to_login : 0);
    }
}
