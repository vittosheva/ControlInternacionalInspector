<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;

class CreatedAtGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Created At'))
            ->getTitleFromRecordUsing(fn ($record) => Carbon::parse(data_get($record, 'created_at'))->format(Table::$defaultDateDisplayFormat))
            ->collapsible();
    }
}
