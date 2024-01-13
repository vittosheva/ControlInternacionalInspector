<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class DocumentGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Document'))
            ->getTitleFromRecordUsing(fn ($record) => $record->document_code ?? null)
            ->collapsible();
    }
}
