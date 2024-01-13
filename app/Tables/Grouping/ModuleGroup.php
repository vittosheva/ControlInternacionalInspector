<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class ModuleGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Module'))
            ->getTitleFromRecordUsing(fn ($record) => $record->categoryType->name ?? null)
            ->collapsible();
    }
}
