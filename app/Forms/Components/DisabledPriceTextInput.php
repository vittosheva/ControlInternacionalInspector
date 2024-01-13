<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;

class DisabledPriceTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label('')
            ->disabled()
            ->extraInputAttributes([
                'class' => 'text-right',
            ])
            ->dehydrated(false)
            ->columnSpan(1);
    }
}
