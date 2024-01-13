<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class IdentificationTypeGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Identification Type'))
            ->getTitleFromRecordUsing(fn ($record) => $record->identification_type->translate() ?? null)
            ->collapsible();
    }
}
