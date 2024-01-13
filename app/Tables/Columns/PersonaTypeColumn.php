<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\TextColumn;

class PersonaTypeColumn extends TextColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Persona Type'))
            ->badge()
            ->alignCenter()
            ->searchable()
            ->toggleable(isToggledHiddenByDefault: true);
    }
}
