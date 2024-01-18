<?php

namespace App\Livewire;

use App\Models\Inspections\BathroomComplianceObservation;
use App\Models\Inspections\ControlRecord;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Livewire\Component;

class ComplementaryServicesPanel extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public ?Collection $bathrooms;

    public function __construct()
    {
        $this->bathrooms = BathroomComplianceObservation::query()->select(['id', 'description'])->get();
    }

    public function mount(ControlRecord $controlRecord): void
    {
        $this->form->fill($controlRecord->toArray());

        foreach ($this->bathrooms as $bathroom) {
            $this->data['bathroom_compliance_observations'][$bathroom->id][0] = true;
            $this->data['bathroom_compliance_observations'][$bathroom->id][1] = true;
            $this->data['bathroom_compliance_observations'][$bathroom->id][2] = true;
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema(fn () => [
                Fieldset::make(__('Inspección de servicios complementarios').':')
                    ->schema([
                        CheckboxList::make('complementary_services')
                            ->label('')
                            ->relationship('complementaryService', 'description')
                            ->bulkToggleable()
                            ->columnSpanFull(),
                    ])
                    ->columnSpan(3),
                Fieldset::make(__('Observaciones ambientales').':')
                    ->schema([
                        CheckboxList::make('environmental_observations')
                            ->label('')
                            ->relationship('environmentalObservationsMany', 'description')
                            ->bulkToggleable()
                            ->columnSpanFull(),
                    ])
                    ->columnSpan(3),
                Fieldset::make(__('Observaciones cumplimiento baños').':')
                    ->schema(fn () => [
                        \Filament\Forms\Components\View::make('components.radios')
                            ->viewData([
                                'bathrooms' => $this->bathrooms,
                            ]),
                    ])
                    ->columns(1)
                    ->columnSpan(6),
            ])
            ->columns(12)
            ->statePath('data')
            ->model(ControlRecord::class);
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.complementary-services-panel');
    }

    public function addComplementaryServices(): void
    {
        $this->data['complementary_services'] = collect($this->data['complementary_services'])->unique()->filter()->toArray();
        $this->data['environmental_observations'] = collect($this->data['environmental_observations'])->unique()->filter()->toArray();
        $this->data['bathroom_compliance_observations'] = collect($this->data['bathroom_compliance_observations'])->filter(fn ($item) => array_filter($item))->toArray();

        if (empty($this->data['complementary_services']) || count($this->data['complementary_services']) <= 0) {
            Notification::make()
                ->title('No ha marcado ningún "Servicio complementario".')
                ->color(Color::Amber)
                ->warning()
                ->send();

            return;
        }

        if (empty($this->data['environmental_observations']) || count($this->data['environmental_observations']) <= 0) {
            Notification::make()
                ->title('No ha marcado ninguna "Observación ambiental".')
                ->color(Color::Amber)
                ->warning()
                ->send();

            return;
        }

        if (empty($this->data['bathroom_compliance_observations']) || count($this->data['bathroom_compliance_observations']) <= 0) {
            Notification::make()
                ->title('No ha marcado ninguna "Observación cumplimiento baños".')
                ->color(Color::Amber)
                ->warning()
                ->send();

            return;
        }

        Notification::make()
            ->title('Servicios complementarios y observaciones agregados.')
            ->color(Color::Blue)
            ->info()
            ->send();

        $this->dispatch('complementaryServicesUpdated', $this->data);
    }
}
