<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\TextColumn;

class EmailColumn extends TextColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Email'))
            ->icon('heroicon-m-envelope')
            ->iconColor('primary')
            ->searchable()
            ->sortable()
            ->toggleable();
    }
}
