<?php

namespace App\Livewire;

use App\Forms\Components\HrPlaceholder;
use App\Models\Inspections\ControlRecord;
use App\Models\Inspections\ControlRecordDetail;
use App\Models\Inspections\Hose;
use App\Models\Inspections\Measurement;
use App\Models\Inspections\Observation;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class HosesPanel extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public array $observations = [];

    public array $measurements = [];

    public ?string $operation = null;

    public string|int|null $companyId = null;

    public string|int|null $stationId = null;

    public ControlRecordDetail $controlRecordDetail;

    public Collection $hoses;

    public Collection $dataCollection;

    public ?string $selectedHose = null;

    protected $listeners = [
        'openHoseInfo',
        'addControl',
        'clearHoses',
    ];

    public function mount($operation, $companyId, $stationId, ControlRecordDetail $controlRecordDetail): void
    {
        $this->form->fill($controlRecordDetail->toArray());

        $this->operation = $operation;
        $this->companyId = $companyId;
        $this->stationId = $stationId;

        $this->hoses = $this->getHoses();
        $this->dataCollection = collect();

        $this->observations = Observation::query()
            ->orderBy('priority')
            ->orderBy('id')
            ->pluck('name', 'id')
            ->toArray();

        $this->measurements = Measurement::query()
            ->whereBetween('id', [1, 13])
            ->pluck('name', 'id')
            ->toArray();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->schema([
                        Fieldset::make(__('Detail').':')
                            ->schema([
                                TextInput::make('hose')
                                    ->label(__('Hose').':')
                                    ->disabled()
                                    ->dehydrated()
                                    ->inlineLabel(),
                                Hidden::make('hose_id')
                                    ->dehydrated(),
                                TextInput::make('fuel')
                                    ->label(__('Fuel.').':')
                                    ->disabled()
                                    ->dehydrated()
                                    ->inlineLabel(),
                                TextInput::make('product')
                                    ->label(__('Product.').':')
                                    ->disabled()
                                    ->dehydrated()
                                    ->inlineLabel(),
                                TextInput::make('color')
                                    ->label(__('Color.').':')
                                    ->disabled()
                                    ->dehydrated()
                                    ->inlineLabel(),
                            ])
                            ->columns(1),

                        Fieldset::make(__('Seals').':')
                            ->schema([
                                TextInput::make('seal_found')
                                    ->label('Encontrado')
                                    ->disabled()
                                    ->dehydrated(),
                                TextInput::make('seal_left')
                                    ->label('Dejado')
                                    ->required(function ($state, $operation) {
                                        if (auth()->user()->isAdmin()) {
                                            return false;
                                        }

                                        return $state == false || $operation === 'create';
                                    }),
                            ])
                            ->columns(1),
                    ])
                    ->columns(1)
                    ->columnSpan(2),

                Fieldset::make(__('Data to be modified').':')
                    ->schema([
                        Select::make('observation_id')
                            ->label(__('Observation'))
                            ->options(fn () => $this->observations)
                            ->default(4)
                            ->disableOptionWhen(fn () => empty($this->selectedHose))
                            ->live()
                            ->afterStateUpdated(function (Component $livewire, Set $set, $state) {
                                if ($state == 4) {
                                    $set('quantity', 0);
                                    $set('octane', 0);
                                } else {
                                    $set('quantity', null);
                                    $set('octane', null);
                                }

                                $livewire->validateOnly('quantity');
                                $livewire->validateOnly('octane');
                            })
                            ->afterStateHydrated(function (Select $component, ?string $state) {
                                if (! empty($this->selectedHose) && empty($state)) {
                                    return $component->state(4);
                                }

                                return $component->state($state);
                            })
                            ->selectablePlaceholder(false)
                            ->required(function () {
                                if (auth()->user()->isAdmin()) {
                                    return false;
                                }

                                return ! empty($this->selectedHose);
                            })
                            ->columnSpan(6),

                        HrPlaceholder::make('')
                            ->extraAttributes(['class' => 'pt-4']),

                        TextInput::make('quantity')
                            ->label(__('Quantity'))
                            ->default(0)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Component $livewire, TextInput $component, Get $get, Set $set) {
                                $livewire->validateOnly($component->getStatePath());

                                if (empty($this->selectedHose) || $get('observation_id') == 4) {
                                    $set('quantity', 0);
                                }
                            })
                            ->rules([
                                'numeric',
                            ])
                            ->extraInputAttributes(['class' => 'text-right'])
                            ->required(function () {
                                if (auth()->user()->isAdmin()) {
                                    return false;
                                }

                                return ! empty($this->selectedHose);
                            })
                            ->columnSpan(3),
                        TextInput::make('octane')
                            ->label(__('Octane'))
                            ->default(0)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Component $livewire, TextInput $component, Get $get, Set $set) {
                                $livewire->validateOnly($component->getStatePath());

                                if (empty($this->selectedHose) || $get('observation_id') == 4) {
                                    $set('octane', 0);
                                }
                            })
                            ->rules([
                                'numeric',
                            ])
                            ->extraInputAttributes(['class' => 'text-right'])
                            ->required(function () {
                                if (auth()->user()->isAdmin()) {
                                    return false;
                                }

                                return ! empty($this->selectedHose);
                            })
                            ->columnSpan(3),

                        TextInput::make('totalizator')
                            ->label(__('Totalizator'))
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
                            ->rules([
                                'numeric',
                            ])
                            ->disabled(fn () => empty($this->selectedHose))
                            ->required()
                            ->extraInputAttributes(['class' => 'text-right'])
                            ->columnSpan(3)
                            ->columnStart(1),
                        Select::make('measurement_id')
                            ->label(__('Medida anterior'))
                            ->options(fn () => $this->measurements)
                            ->default(7)
                            ->disabled()
                            ->dehydrated()
                            ->afterStateHydrated(function (Select $component, ?string $state) {
                                if (! empty($this->selectedHose) && empty($state) || empty($this->measurements)) {
                                    return $component->state(7);
                                }

                                return $component->state($state);
                            })
                            ->columnSpan(3),
                        Select::make('measurement_id_sec_1')
                            ->label(__('Medida actual'))
                            ->options(fn () => $this->measurements)
                            ->live()
                            ->afterStateHydrated(function (Select $component, ?string $state) {
                                if (! empty($this->selectedHose) && empty($state)) {
                                    return $component->state(7);
                                }

                                return $component->state($state);
                            })
                            ->default(0)
                            ->disableOptionWhen(fn () => empty($this->selectedHose))
                            ->required(function ($state, $operation) {
                                if (auth()->user()->isAdmin()) {
                                    return false;
                                }

                                return $state == false || $operation === 'create';
                            })
                            ->columnSpan(3),

                        HrPlaceholder::make('')
                            ->extraAttributes(['class' => 'pt-4']),

                        Select::make('company_observation_id')
                            ->label(__('Observation Gas Station'))
                            ->options(fn () => $this->observations)
                            ->default(4)
                            ->disableOptionWhen(fn () => empty($this->selectedHose))
                            ->live()
                            ->afterStateUpdated(function (Set $set, $state) {
                                if ($state == 4) {
                                    $set('quantity', 0);
                                    $set('octane', 0);
                                }
                            })
                            ->afterStateHydrated(function (Select $component, ?string $state) {
                                if (! empty($this->selectedHose) && empty($state)) {
                                    return $component->state(4);
                                }

                                return $component->state($state);
                            })
                            ->selectablePlaceholder(false)
                            ->required(function () {
                                if (auth()->user()->isAdmin()) {
                                    return false;
                                }

                                return ! empty($this->selectedHose);
                            })
                            ->columnSpan(5),
                    ])
                    ->columns(12)
                    ->columnSpan(6),
            ])
            ->columns(8)
            ->statePath('data')
            ->model($this->controlRecordDetail ?? ControlRecordDetail::class);
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.hoses-panel');
    }

    public function openHoseInfo($id): void
    {
        $this->selectedHose = $id;

        $hoseName = $this->hoses->firstWhere('id', '=', $this->selectedHose)->name ?? null;
        $selected = $this->dataCollection->first(fn ($value, $key) => $key === $hoseName);

        if ($this->operation === 'create') {
            if (! empty($selected)) {
                $this->form->fill($selected);

                return;
            }

            $control = $this->getControlRecordFromDatabase();
        } elseif ($this->operation === 'edit') {
            if (! empty($selected)) {
                $this->form->fill($selected);

                return;
            }

            $control = $this->getControlRecordFromDatabase(false);
        }

        if (
            empty($control)
            || empty($control->details)
            || empty($control->details->firstWhere('hose_id', '=', $id))
        ) {
            return;
        }

        $selected = $control->details->firstWhere('hose_id', '=', $id);

        $this->form->fill(
            $selected->only([
                'control_record_id',
                'hose_id',
                'seal_found',
                'seal_left',
                'observation_id',
                'observations',
                'company_observation_id',
                'company_observations',
                'measurement_id_sec_1',
                'measurement_id_sec_2',
                'totalizator',
            ]) + [
                'hose' => $selected->hose->name,
                'fuel' => $selected->hose->type->name,
                'product' => $selected->hose->type->code,
                'color' => $this->hoses->firstWhere('id', '=', $this->selectedHose)->color,
                'quantity' => (empty($selected->quantity) && $this->operation === 'edit') ? $selected->quantity : 0,
                'octane' => (empty($selected->octane) && $this->operation === 'edit') ? $selected->octane : 0,
                'measurement_id' => $selected->measurement->id ?? 0,
            ]
        );
    }

    public function addControl(): void
    {
        $this->dataCollection->put(
            $this->hoses->firstWhere('id', '=', $this->selectedHose)->name,
            $this->form->getState()
        );

        Notification::make()
            ->title('Inspección agregada')
            ->color(Color::Blue)
            ->info()
            ->send();

        $this->dispatch('hosesUpdated', [
            'total' => $this->hoses->count(),
            'inspections_done' => $this->dataCollection,
        ]);
    }

    public function clearHoses($data): void
    {
        $this->hoses = collect();
        $this->dataCollection = collect();

        if (empty($data['company_id']) || empty($data['station_id'])) {
            return;
        }

        $this->stationId = $data['station_id'];
        $this->companyId = $data['company_id'];

        $this->hoses = $this->getHoses();
    }

    protected function getHoses(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Hose::query()
            ->with('type')
            ->where('company_id', '=', $this->companyId)
            ->where('station_id', '=', $this->stationId)
            ->orderBy('name')
            ->get();
    }

    protected function getControlRecordFromDatabase(bool $subtract = true): Model|Builder|null
    {
        return ControlRecord::query()
            ->with([
                'details' => [
                    'hose',
                    'measurement',
                ],
                'bathroomState',
            ])
            ->where('company_id', '=', $this->companyId)
            ->where('station_id', '=', $this->stationId)
            ->where('year', '=', $subtract ? now()->subYear()->format('Y') : now()->format('Y'))
            ->where('month', '=', $subtract ? now()->subMonth()->format('n') : now()->format('n'))
            ->latest('inspection_date')
            ->first();
    }
}
