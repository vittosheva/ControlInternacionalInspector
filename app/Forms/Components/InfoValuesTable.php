<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class InfoValuesTable extends Field
{
    protected string $view = 'forms.components.info-values-table';

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Totals'))
            ->dehydrated(false)
            ->columns(1)
            ->columnSpanFull();
    }
}
