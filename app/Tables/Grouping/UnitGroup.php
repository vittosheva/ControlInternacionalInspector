<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class UnitGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Unit'))
            ->getTitleFromRecordUsing(fn ($record) => $record->unit->name ?? null)
            ->collapsible();
    }
}
