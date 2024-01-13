<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Livewire\Component;

class BusinessNameTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Business Name'))
            ->prefixIcon('heroicon-o-at-symbol')
            ->hintIcon('heroicon-o-information-circle', tooltip: __('Tooltip for business name'))
            ->maxLength(100)
            ->live(onBlur: true)
            ->afterStateUpdated(function (?string $state, ?string $old, Set $set, Component $livewire, TextInput $component) {
                $livewire->validateOnly($component->getStatePath());
                $set('trade_name', str($state)->words(45, end: ''));
            })
            ->columnSpanFull()
            ->columnSpan(2)
            ->required();
    }
}
