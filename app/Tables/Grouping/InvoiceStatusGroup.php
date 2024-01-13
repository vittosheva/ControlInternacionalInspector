<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class InvoiceStatusGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Status'))
            ->getKeyFromRecordUsing(fn ($record): string => $record->status->value)
            ->getTitleFromRecordUsing(fn ($record) => $record->status->translate() ?? null)
            ->getDescriptionFromRecordUsing(fn ($record): string => $record->status->explanation())
            ->collapsible();
    }
}
