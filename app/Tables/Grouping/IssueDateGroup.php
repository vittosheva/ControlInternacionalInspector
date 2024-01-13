<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;

class IssueDateGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Issue Date'))
            ->getTitleFromRecordUsing(fn ($record) => Carbon::parse(data_get($record, 'issue_date'))->format(Table::$defaultDateDisplayFormat))
            ->collapsible();
    }
}
