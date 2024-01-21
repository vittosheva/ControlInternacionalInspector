<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class BathroomsPanel extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public string $relationName = 'bathroom_compliance_observations';

    public ?array $bathrooms = [];

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.bathrooms-panel');
    }

    public function addBathroomCheck($id, $type): void
    {
        $this->data[$id] = array_merge($this->data[$id], $type);

        /*if (empty($this->data['bathroom_compliance_observations']) || count($this->data['bathroom_compliance_observations']) <= 0) {
            Notification::make()
                ->title('No ha marcado ninguna "Observación cumplimiento baños".')
                ->color(Color::Amber)
                ->warning()
                ->send();
        }

        Notification::make()
            ->title('Servicios complementarios y observaciones agregados.')
            ->color(Color::Blue)
            ->info()
            ->send();

        $this->dispatch('complementaryServicesUpdated', $this->data);*/
    }
}
