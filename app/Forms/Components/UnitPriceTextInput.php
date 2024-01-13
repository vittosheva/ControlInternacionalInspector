<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;

class UnitPriceTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Unit Price'))
            ->live(onBlur: true)
            ->rules([
                'regex:/^\d{1,6}(\.\d{0,'.config('dorsi.decimals_unit_price').'})?$/',
            ])
            ->step(0.01)
            ->inputMode('decimal')
            ->disabled(fn (Get $get) => blank($get('item_id')))
            ->extraInputAttributes([
                'class' => 'text-right',
            ])
            ->placeholder('$0.00');
    }
}
