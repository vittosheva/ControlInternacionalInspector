<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class VendorGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Vendor'))
            ->getTitleFromRecordUsing(fn ($record) => $record->persona_business_name ?? $record->vendor_id ?? null)
            ->collapsible();
    }
}
