<?php

namespace App\Livewire;

use App\Forms\Components\HrPlaceholder;
use App\Models\Inspections\ControlRecord;
use App\Models\Inspections\ControlRecordDetail;
use App\Models\Inspections\GasStationObservation;
use App\Models\Inspections\Hose;
use App\Models\Inspections\Measurement;
use App\Models\Inspections\Observation;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
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

    public array $observationsCompany = [];

    public array $observationsGasStation = [];

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

        $this->observationsCompany = Observation::query()
            ->orderBy('priority')
            ->orderBy('id')
            ->pluck('name', 'id')
            ->toArray();

        $this->observationsGasStation = GasStationObservation::query()
            ->orderBy('priority')
            ->orderBy('id')
            ->pluck('name', 'id')
            ->toArray();

        $this->measurements = Measurement::query()
            ->orderBy('order_measurements')
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
                            ->label(__('Observation ARCERNNR'))
                            ->options(fn () => $this->observationsCompany)
                            ->default(4)
                            ->disableOptionWhen(fn () => empty($this->selectedHose))
                            ->live(onBlur: true)
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

                                if (empty($this->selectedHose)) {
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
                            ->live(onBlur: true)->rules([
                                'numeric',
                            ])
                            ->afterStateUpdated(function (Component $livewire, TextInput $component, Get $get, Set $set) {
                                $livewire->validateOnly($component->getStatePath());

                                if (empty($this->selectedHose)) {
                                    $set('octane', 0);
                                }
                            })
                            ->extraInputAttributes(['class' => 'text-right'])
                            ->required(function () {
                                if (auth()->user()->isAdmin()) {
                                    return false;
                                }

                                return ! empty($this->selectedHose);
                            })
                            ->columnSpan(3),

                        HrPlaceholder::make('')
                            ->extraAttributes(['class' => 'pt-4']),

                        TextInput::make('totalizator')
                            ->label(__('Totalizator'))
                            ->live(onBlur: true)
                            ->rules([
                                'required',
                                'numeric',
                            ])
                            ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
                            ->disabled(fn () => empty($this->selectedHose))
                            ->required()
                            ->extraInputAttributes(['class' => 'text-right'])
                            ->columnSpan(3),
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
                        Fieldset::make(__('Medidas actuales').':')
                            ->schema([
                                Repeater::make('measurements_array')
                                    ->label('')
                                    ->simple(
                                        Select::make('measurement_id')
                                            ->label(__('Medida anterior'))
                                            ->options(fn () => $this->measurements)
                                            ->default(7)
                                            ->live(onBlur: true)
                                            ->required()
                                            ->columnSpanFull(),
                                    )
                                    ->addActionLabel(__('Append'))
                                    ->required()
                                    ->columnSpanFull(),
                            ])
                            ->disabled(fn () => empty($this->selectedHose))
                            ->columns(12)
                            ->columnSpan(6),

                        HrPlaceholder::make('')
                            ->extraAttributes(['class' => 'pt-4']),

                        Select::make('company_observation_id')
                            ->label(__('Observation Gas Station'))
                            ->options(fn () => $this->observationsGasStation)
                            ->default(4)
                            ->disableOptionWhen(fn () => empty($this->selectedHose))
                            ->live(onBlur: true)
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
        $lastMonth = false;

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
        } else {
            $lastMonth = true;
        }

        if (empty($control) || empty($control->details) || empty($control->details->firstWhere('hose_id', '=', $id))) {
            $control = $this->getControlRecordFromDatabase();

            if (empty($control) || empty($control->details) || empty($control->details->firstWhere('hose_id', '=', $id))) {
                $selected = $this->hoses->firstWhere('id', '=', $this->selectedHose);

                $this->form->fill([
                    'hose_id' => $selected->id,
                    'color' => $selected->color,
                    'seal_found' => $selected->current_seal ?? null,
                    'seal_left' => $selected->seal_left ?? null,
                    'hose' => $selected->name,
                    'fuel' => $selected->type->name,
                    'product' => $selected->type->code,
                    'quantity' => $this->calculate($selected, 'quantity', $lastMonth),
                    'octane' => $this->calculate($selected, 'octane', $lastMonth),
                    'measurement_id' => 0,
                ]);

                return;
            }
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
                'measurements_array',
                'totalizator',
            ]) + [
                'hose' => $selected->hose->name,
                'fuel' => $selected->hose->type->name,
                'product' => $selected->hose->type->code,
                'color' => $this->hoses->firstWhere('id', '=', $this->selectedHose)->color,
                'quantity' => $this->calculate($selected, 'quantity', $lastMonth),
                'octane' => $this->calculate($selected, 'octane', $lastMonth),
                'measurement_id' => $selected->measurement->id ?? 0,
            ]
        );
    }

    public function addControl(): void
    {
        $form = $this->form->getState();

        $form['measurements_array'] = collect($form['measurements_array'])->flatten()->toArray();

        $this->dataCollection->put(
            $this->hoses->firstWhere('id', '=', $this->selectedHose)->name,
            $form
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
        $record = ControlRecord::query()
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

        if (! empty($record->details) && $record->details->isNotEmpty()) {
            $record->details->map(function ($detail) {
                if (! empty($detail->measurements_array) && is_array($detail->measurements_array)) {
                    $detail->measurements_array = Measurement::query()
                        ->whereIn('id', $detail->measurements_array)
                        //->orderBy('order_measurements')
                        ->pluck('name', 'id')
                        ->toArray();
                }
            });
        }

        return $record;
    }

    protected function calculate($selected, $variable, $lastMonth = false): int
    {
        if ($this->operation === 'create') {
            return 0;
        }

        if ($this->operation === 'edit') {
            if (! empty($selected->$variable)) {
                return $selected->$variable;
            }

            return 0;
        }

        return $selected->$variable;
    }
}
