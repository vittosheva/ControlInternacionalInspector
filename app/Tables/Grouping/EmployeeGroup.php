<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class EmployeeGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Employee'))
            ->getTitleFromRecordUsing(fn ($record) => $record->name ?? $record->user_id ?? null)
            ->collapsible();
    }
}
