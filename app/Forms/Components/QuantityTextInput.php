<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;

class QuantityTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Quantity'))
            ->live(onBlur: true)
            ->rules([
                'regex:/^\d{1,6}(\.\d{0,'.config('dorsi.decimals_quantity').'})?$/',
            ])
            ->step(0.01)
            ->inputMode('decimal')
            ->extraInputAttributes([
                'class' => 'text-right',
            ]);
    }
}
