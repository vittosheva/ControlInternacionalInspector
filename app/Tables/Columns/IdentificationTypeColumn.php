<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\TextColumn;

class IdentificationTypeColumn extends TextColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Identification Type'))
            ->badge()
            ->alignCenter()
            ->searchable()
            ->toggleable(isToggledHiddenByDefault: true);
    }
}
