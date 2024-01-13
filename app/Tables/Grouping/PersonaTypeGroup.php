<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class PersonaTypeGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Persona Type'))
            ->getTitleFromRecordUsing(fn ($record) => $record->persona_type->translate() ?? null)
            ->collapsible();
    }
}
