<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\TextColumn;

class CategoryColumn extends TextColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Category'))
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true);
    }
}
