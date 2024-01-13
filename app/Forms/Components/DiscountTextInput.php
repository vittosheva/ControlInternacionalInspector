<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;

class DiscountTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Desc.'))
            ->live(onBlur: true)
            ->step(0.01)
            ->inputMode('decimal')
            ->rules([
                'regex:/^\d{1,6}(\.\d{0,'.config('dorsi.decimals_discount').'})?$/',
                /*fn (Get $get): Closure => function (string $attribute, $value, \Closure $fail) use ($get) {
                    if ($get('other_field') === 'foo' && $value !== 'bar') {
                        $fail("The {$attribute} is invalid.");
                    }
                },*/
            ])
            ->disabled(fn (Get $get) => blank($get('item_id')))
            ->extraInputAttributes([
                'class' => 'text-right',
            ])
            ->placeholder('$0.00');
    }
}
