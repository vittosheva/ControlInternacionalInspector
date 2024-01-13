<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;
use Livewire\Component;

class NameTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Name'))
            ->live(onBlur: true)
            ->afterStateUpdated(fn ($state, Component $livewire, NameTextInput $component) => $livewire->validateOnly($component->getStatePath()))
            //->unique(static::$model, 'name', ignoreRecord: true)
            ->autocomplete(false);
    }
}
