<?php

namespace App\Tables\Grouping;

use Filament\Tables\Grouping\Group;

class CustomerGroup extends Group
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Customer'))
            ->getKeyFromRecordUsing(fn ($record): string => $record->persona_business_name ?? $record->customer_id)
            ->getTitleFromRecordUsing(fn ($record) => $record->persona_business_name ?? $record->customer_id ?? null)
            ->getDescriptionFromRecordUsing(fn ($record): string => $record->persona_identification_number)
            ->collapsible();
    }
}
