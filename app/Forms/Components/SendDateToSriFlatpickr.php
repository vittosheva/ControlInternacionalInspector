<?php

namespace App\Forms\Components;

use Coolsam\FilamentFlatpickr\Forms\Components\Flatpickr;
use Livewire\Component;

class SendDateToSriFlatpickr extends Flatpickr
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Sending Date To SRI'))
            ->hintIcon('heroicon-o-information-circle', __('You can enter date and time so that DORSI automatically sends it to the SRI'))
            ->minDate(today())
            ->enableTime()
            ->enableSeconds(false)
            ->autocomplete(false)
            ->prefixIcon('heroicon-o-calendar-days')
            ->afterStateUpdated(fn (Component $livewire, SendDateToSriFlatpickr $component) => $livewire->validateOnly($component->getStatePath()))
            //->altFormat('d-m-Y')
            ->dateFormat('Y-m-d')
            ->maxDate(today()->addMonth())
            ->default(null)
            ->placeholder(now()->format('d-m-Y H:i'));
    }
}
