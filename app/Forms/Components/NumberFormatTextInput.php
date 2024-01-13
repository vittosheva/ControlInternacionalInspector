<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;
use Livewire\Component;

class NumberFormatTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->default(0)
            ->hintIcon(
                fn ($operation) => $operation === 'create' ? 'heroicon-o-information-circle' : null,
                fn ($operation) => $operation === 'create' ? __('The document number will be generated when saving') : null,
            )
            ->disabled()
            ->formatStateUsing(fn ($state) => idNumberFormat($state))
            ->afterStateUpdated(fn (Component $livewire, NumberFormatTextInput $component) => $livewire->validateOnly($component->getStatePath()))
            ->dehydrated(false);
    }
}
