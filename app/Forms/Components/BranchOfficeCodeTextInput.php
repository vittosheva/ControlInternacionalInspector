<?php

namespace App\Forms\Components;

use App\Models\Setting\BranchOffice;
use Filament\Forms\Components\TextInput;
use Illuminate\Validation\Rules\Unique;
use Livewire\Component;

class BranchOfficeCodeTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Code'))
            ->live(onBlur: true)
            ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
            ->unique(BranchOffice::class, 'establishment', ignoreRecord: true, modifyRuleUsing: function (Unique $rule) {
                return $rule
                    ->where('is_active', 1)
                    ->whereNull('deleted_at');
            })
            ->numeric()
            ->step(001)
            ->mask('999')
            ->maxLength(3)
            ->required();
    }
}
