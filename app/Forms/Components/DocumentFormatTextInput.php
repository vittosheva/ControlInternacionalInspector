<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Livewire\Component;

class DocumentFormatTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Invoice No'))
            ->string()
            ->hintIcon('heroicon-o-information-circle', __("Remember to use '-' symbol"))
            ->mask('999-999-999999999')
            ->placeholder('999-999-999999999')
            ->afterStateUpdated(function (Component $livewire, TextInput $component, $state, Set $set) {
                if ($state === null) {
                    return;
                }

                if (strlen($state) > 17) {
                    $set($this->getName(), substr($state, 0, -1));
                }

                $livewire->validateOnly($component->getStatePath());
            })
            ->rules([
                'string',
                'min:17',
                'max:17',
                'regex:/^\d{3}-\d{3}-\d{9}$/',
            ])
            ->live(onBlur: true)
            ->extraInputAttributes(['class' => 'text-center']);
    }
}
