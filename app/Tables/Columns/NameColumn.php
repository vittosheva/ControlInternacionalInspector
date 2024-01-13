<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\TextColumn;

class NameColumn extends TextColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Name'))
            ->searchable()
            ->sortable()
            ->toggleable();
    }
}
