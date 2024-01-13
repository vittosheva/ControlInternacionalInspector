<?php

namespace App\Forms\Components;

use Filament\Forms\Components\KeyValue;

class AdditionalDataKeyValue extends KeyValue
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Additional Data'))
            ->keyLabel(__('Name'))
            ->keyPlaceholder(__('Enter Name'))
            ->valueLabel(__('Value'))
            ->valuePlaceholder(__('Enter Value'))
            ->reorderable()
            ->columnSpanFull();
    }
}
