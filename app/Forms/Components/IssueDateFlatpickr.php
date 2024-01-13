<?php

namespace App\Forms\Components;

use Coolsam\FilamentFlatpickr\Forms\Components\Flatpickr;
use Livewire\Component;

class IssueDateFlatpickr extends Flatpickr
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Issue Date'))
            ->autocomplete(false)
            ->prefixIcon('heroicon-o-calendar-days')
            ->afterStateUpdated(fn (Component $livewire, IssueDateFlatpickr $component) => $livewire->validateOnly($component->getStatePath()))
            //->altFormat('d-m-Y')
            ->dateFormat('Y-m-d')
            ->maxDate(today())
            ->default(now()->format('Y-m-d'))
            ->placeholder(now()->format('Y-m-d'));
    }
}
