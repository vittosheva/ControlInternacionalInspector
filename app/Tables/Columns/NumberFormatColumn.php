<?php

namespace App\Tables\Columns;

use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;

class NumberFormatColumn extends TextColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Item No'))
            ->weight(FontWeight::SemiBold)
            ->searchable()
            ->sortable()
            ->toggleable(false);
    }
}
