<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class CategoryGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Category'))
            ->getTitleFromRecordUsing(fn ($record) => $record->category->name ?? null)
            ->collapsible();
    }
}
