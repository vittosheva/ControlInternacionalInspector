<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class TypePersonGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Type Person'))
            ->getTitleFromRecordUsing(fn ($record) => $record->type_person?->translate() ?? __('None'))
            ->collapsible();
    }
}
