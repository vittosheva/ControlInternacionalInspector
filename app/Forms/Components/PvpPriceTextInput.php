<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;

class PvpPriceTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('PVP Price'))
            ->helperText(__('PVP Price Helper Text'))
            ->live(onBlur: true)
            ->rules([
                'regex:/^\d{1,6}(\.\d{0,'.config('dorsi.decimals_price').'})?$/',
            ])
            ->step(0.01)
            ->inputMode('decimal')
            ->disabled()
            ->extraInputAttributes([
                'class' => 'text-right',
            ])
            ->formatStateUsing(fn (Get $get) => $get('pvp_price'))
            ->afterStateUpdated(fn ($state, PvpPriceTextInput $component, Set $set, Get $get) => generatePvpPrice($component->getName(), $set, $get))
            ->placeholder('$0.00');
    }
}
