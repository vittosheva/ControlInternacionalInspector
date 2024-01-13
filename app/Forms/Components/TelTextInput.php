<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Livewire\Component;
use Propaganistas\LaravelPhone\PhoneNumber;

class TelTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Telephone'))
            ->tel()
            ->live(onBlur: true)
            ->prefixIcon('heroicon-o-phone')
            ->hintIcon('heroicon-o-information-circle', tooltip: __('Tooltip for telephone'))
            ->maxLength(100)
            ->afterStateUpdated(function ($state, Component $livewire, TextInput $component, Set $set) {
                $livewire->validateOnly($component->getStatePath());
                $set($this->getName(), (string) new PhoneNumber($state, 'EC'));
            })
            ->dehydrateStateUsing(fn (string $state): string => (string) new PhoneNumber($state, 'EC'))
            ->rule('phone:EC');
    }
}
