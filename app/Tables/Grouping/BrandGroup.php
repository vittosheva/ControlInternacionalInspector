<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class BrandGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Brand'))
            ->getTitleFromRecordUsing(fn ($record) => $record->brand->name ?? null)
            ->collapsible();
    }
}
