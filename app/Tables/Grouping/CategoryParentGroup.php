<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class CategoryParentGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Category Parent'))
            ->getTitleFromRecordUsing(fn ($record) => $record->parent->name ?? null)
            ->collapsible();
    }
}
