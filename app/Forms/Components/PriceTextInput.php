<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Livewire\Component;

class PriceTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Price'))
            ->live(onBlur: true)
            ->step(0.01)
            ->inputMode('decimal')
            ->placeholder('$0.00')
            ->extraInputAttributes([
                'class' => 'text-right',
            ])
            ->rules([
                'regex:/^\d{1,6}(\.\d{0,'.config('dorsi.decimals_price').'})?$/',
            ])
            ->formatStateUsing(fn (?string $state): string => numberFormat($state))
            ->afterStateUpdated(function (PriceTextInput $component, Component $livewire, ?string $state, Set $set, Get $get) {
                $livewire->validateOnly($component->getStatePath());
                generatePvpPrice($component->getName(), $set, $get);

                return $set($component->getName(), numberFormat($state));
            });
    }
}
