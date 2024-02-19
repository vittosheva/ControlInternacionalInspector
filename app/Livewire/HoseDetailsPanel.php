<?php

namespace App\Livewire;

use App\Models\Inspections\ControlRecord;
use App\Models\Inspections\Measurement;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class HoseDetailsPanel extends Component
{
    public ?array $data = [];

    public ?ControlRecord $record;

    public function mount($record = null): void
    {
        if (empty($record)) {
            return;
        }

        $this->record = $record->load([
            'details' => [
                'hose',
                'measurement',
                'measurement2',
                'observation',
                'observationCompany',
            ],
        ]);

        $this->record->details->map(function ($detail) {
            if (! empty($detail->measurements_array) && is_array($detail->measurements_array)) {
                $detail->measurements_array = Measurement::query()
                    ->whereIn('id', $detail->measurements_array)
                    //->orderBy('order_measurements')
                    ->pluck('name')
                    ->implode(', ');
            }
        });
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.hose-details-panel');
    }
}
