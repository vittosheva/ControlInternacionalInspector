<?php

namespace App\Livewire;

use App\Models\Inspections\ControlRecord;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class HoseDetailsPanel extends Component
{
    public ?array $data = [];

    public ControlRecord $record;

    public function mount(ControlRecord $record): void
    {
        $this->record = $record->load([
            'details' => [
                'hose',
                'measurement',
                'measurement2',
                'observation',
                'observationCompany',
            ],
        ]);
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.hose-details-panel');
    }
}
