<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\TextColumn;

class DatetimeColumn extends TextColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Issue Date'))
            ->dateTime()
            ->sortable()
            ->toggleable();
    }
}
