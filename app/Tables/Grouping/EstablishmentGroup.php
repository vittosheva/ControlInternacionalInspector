<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class EstablishmentGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Establishment'))
            ->getTitleFromRecordUsing(fn ($record) => $record->establishment ?? null)
            ->collapsible();
    }
}
