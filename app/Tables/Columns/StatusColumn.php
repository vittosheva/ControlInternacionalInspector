<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\TextColumn;

class StatusColumn extends TextColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Status'))
            ->tooltip(fn ($state): string => $state->explanation() ?? null)
            ->badge()
            ->alignCenter()
            ->sortable()
            ->toggleable();
    }
}
