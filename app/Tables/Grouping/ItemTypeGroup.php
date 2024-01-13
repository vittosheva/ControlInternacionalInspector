<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class ItemTypeGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Type'))
            ->getTitleFromRecordUsing(fn ($record) => $record->type->translate() ?? null)
            ->collapsible();
    }
}
