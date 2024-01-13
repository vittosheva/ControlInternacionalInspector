<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\TextColumn;

class PasswordAccessColumn extends TextColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Password Access'))
            ->alignCenter()
            ->tooltip(fn ($state) => ! empty($state) ? __('Click to copy') : null)
            ->copyable(fn ($state) => $state)
            ->copyMessage(__('Password Access copied'))
            ->copyMessageDuration(1500)
            ->searchable()
            ->toggleable(isToggledHiddenByDefault: true);
    }
}
