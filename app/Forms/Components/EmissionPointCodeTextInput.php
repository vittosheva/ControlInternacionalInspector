<?php

namespace App\Forms\Components;

use App\Models\Setting\EmissionPoint;
use Closure;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EmissionPointCodeTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Code'))
            ->live(onBlur: true)
            ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
            ->rules([
                fn (Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                    if (! empty($value) && ! empty($get('code')) && DB::table(EmissionPoint::getModel()->getTable())
                        ->where('id', '<>', $get('id'))
                        ->where('branch_office_id', '=', $get('branch_office_id'))
                        ->where('code', '=', $value)
                        ->where('is_active', '=', 1)
                        ->whereNull('deleted_at')
                        ->exists()
                    ) {
                        $fail(__('The establishment already has this emission point'));
                    }
                },
            ])
            ->numeric()
            ->step(001)
            ->mask('999')
            ->maxLength(3)
            ->required();
    }
}
