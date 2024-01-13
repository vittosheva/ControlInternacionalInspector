<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class ManagerGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Manager'))
            ->getTitleFromRecordUsing(fn ($record): string => $record->manager->name ?? '')
            ->collapsible();
    }
}
