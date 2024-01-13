<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\TextColumn;

class CreatedByColumn extends TextColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Created By'))
            ->numeric()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true);
    }
}
