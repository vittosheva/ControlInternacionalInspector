<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class BathroomsPanel extends Component implements HasForms
{
    use InteractsWithForms;

    public ?string $operation;

    public ?array $data = [];

    public string $relationName = 'bathroom_compliance_observations';

    public ?array $bathrooms = [];

    public Collection|array|null $selected = null;

    public function mount(): void
    {
        $items = [];
        $selected = [];

        if (! empty($this->selected)) {
            $selected = $this->selected->mapWithKeys(fn ($data) => [$data->bathroom_compliance_observations_id => [$data->men, $data->women, $data->disability_person]])->toArray();
        }

        for ($bathroom = 1; $bathroom <= count($this->bathrooms); $bathroom++) {
            if ($this->operation === 'create') {
                $items[$bathroom] = [
                    'men' => true,
                    'women' => true,
                    'disability_person' => true,
                ];
            } else {
                $items[$bathroom] = [
                    'men' => (bool) ($selected[$bathroom][0] ?? false),
                    'women' => (bool) ($selected[$bathroom][1] ?? false),
                    'disability_person' => (bool) ($selected[$bathroom][2] ?? false),
                ];
            }
        }

        $this->data[$this->relationName] = $items;
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.bathrooms-panel');
    }

    public function addBathroomCheck(): void
    {
        $this->dispatch('complementaryServicesUpdated', [
            'bathroom_compliance_observations' => $this->data[$this->relationName],
        ]);
    }
}
