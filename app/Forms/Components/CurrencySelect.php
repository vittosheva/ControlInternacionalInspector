<?php

namespace App\Forms\Components;

use App\Models\Locale\Currency;
use Filament\Forms\Components\Select;

class CurrencySelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Currency'))
            ->options(Currency::pluck('name', 'id')->toArray())
            ->default('Dólar')
            ->searchable();
    }
}
