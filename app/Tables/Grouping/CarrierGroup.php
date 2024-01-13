<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class CarrierGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Carrier'))
            ->getTitleFromRecordUsing(fn ($record) => $record->persona_business_name ?? $record->carrier_id ?? null)
            ->collapsible();
    }
}
