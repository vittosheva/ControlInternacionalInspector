<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\TextColumn;

class CreatedAtColumn extends TextColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Created At'))
            ->alignCenter()
            //->dateTime()
            ->sortable()
            //->badge()
            ->toggleable();
    }
}
