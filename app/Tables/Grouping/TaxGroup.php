<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class TaxGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Tax'))
            ->getTitleFromRecordUsing(fn ($record) => $record->tax->name ?? null)
            ->collapsible();
    }
}
