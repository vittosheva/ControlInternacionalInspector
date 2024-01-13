<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\TextColumn;

class DateColumn extends TextColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Issue Date'))
            ->alignCenter()
            ->date('d-m-Y')
            ->sortable()
            ->toggleable();
    }
}
