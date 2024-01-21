<?php

namespace App\Traits;

use App\Forms\Components\HrPlaceholder;
use App\Livewire\BathroomsPanel;
use App\Livewire\HoseDetailsPanel;
use App\Livewire\HosesPanel;
use App\Models\Inspections\BathroomComplianceObservation;
use App\Models\Inspections\Company;
use App\Models\Inspections\ControlRecord;
use App\Models\Inspections\Station;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Livewire;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\View;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

trait InspectionFormTrait
{
    protected static function getHeaderStatistics(): array
    {
        return [
            Placeholder::make('created_at')
                ->label(__('Created At'))
                ->content(fn ($record): ?string => $record->created_at ?? '-'),

            Placeholder::make('updated_at')
                ->label(__('Updated At 2'))
                ->content(fn ($record): ?string => $record->updated_at ?? '-'),
        ];
    }

    protected static function getHeaderData(): array
    {
        return [
            TextInput::make('inspection_date')
                ->label(__('Inspection Date'))
                ->default(now()->format('d-m-Y'))
                ->extraInputAttributes(['class' => 'text-center'])
                ->disabled()
                ->required()
                ->columnSpan(2),

            Select::make('company_id')
                ->label(__('Trading Company'))
                ->relationship('company', 'name', fn (Builder $query) => $query->oldest('name'))
                ->afterStateUpdated(function (Set $set, $state, Component $livewire) {
                    $company = Company::query()
                        ->find($state, [
                            'id',
                            'price_extra',
                            'price_super',
                            'price_diesel_1',
                            'price_diesel_2',
                            'price_eco_plus',
                        ]);

                    $set('station_id', null);
                    $set('address', null);

                    $set('price_extra', $company->price_extra ?? null);
                    $set('price_super', $company->price_super ?? null);
                    $set('price_diesel_2', $company->price_diesel_2 ?? null);
                    $set('price_eco_plus', $company->price_eco_plus ?? null);

                    $livewire->validateOnly('price_extra');
                    $livewire->validateOnly('price_super');
                    $livewire->validateOnly('price_diesel_2');
                    $livewire->validateOnly('price_eco_plus');

                    $livewire->dispatch('clearHoses', [
                        'company_id' => $company->id,
                        'station_id' => null,
                    ]);
                })
                ->searchable()
                ->selectablePlaceholder(false)
                ->required()
                ->columnSpan(3),

            Select::make('station_id')
                ->label(__('Gas Station'))
                ->relationship('station', 'name', function (Builder $query, Get $get, $operation) {
                    $query = $query->oldest('name');

                    if ($operation === 'view') {
                        return $query;
                    }

                    if (empty($get('company_id'))) {
                        return $query->whereNull('id');
                    }

                    if ($operation === 'create') {
                        $stationsWithInspectionsInThisYearAndMonth = ControlRecord::query()
                            ->where('year', '=', date('Y'))
                            ->where('month', '=', date('n'))
                            ->where('company_id', '=', $get('company_id'))
                            ->pluck('station_id')
                            ->toArray();

                        return $query
                            ->where('company_id', '=', $get('company_id'))
                            ->whereNotIn('id', $stationsWithInspectionsInThisYearAndMonth);
                    }

                    return $query;
                })
                ->disableOptionWhen(fn (Get $get) => blank($get('company_id')))
                ->live()
                ->afterStateUpdated(function (Get $get, Set $set, $state, Component $livewire) {
                    $station = Station::query()
                        ->with('company:id,price_extra,price_super,price_diesel_1,price_diesel_2,price_eco_plus')
                        ->find($state, ['id', 'company_id', 'street']);

                    $set('address', ! empty($station->street) ? $station->street : 'Sin dirección');

                    $set('price_extra', $station->company->price_extra ?? null);
                    $set('price_super', $station->company->price_super ?? null);
                    $set('price_diesel_2', $station->company->price_diesel_2 ?? null);
                    $set('price_eco_plus', $station->company->price_eco_plus ?? null);

                    $livewire->validateOnly('price_extra');
                    $livewire->validateOnly('price_super');
                    $livewire->validateOnly('price_diesel_2');
                    $livewire->validateOnly('price_eco_plus');

                    $livewire->dispatch('clearHoses', [
                        'company_id' => $get('company_id'),
                        'station_id' => $station->id,
                    ]);
                })
                ->preload()
                ->searchable()
                ->selectablePlaceholder(false)
                ->required()
                ->columnSpan(3),

            TextInput::make('address')
                ->label(__('Address'))
                ->afterStateHydrated(function (Get $get, Set $set) {
                    if (! empty($get('station_id'))) {
                        $street = Station::query()
                            ->find($get('station_id'), ['id', 'street'])
                            ->getAttributeValue('street');

                        return $set('address', ! empty($street) ? $street : 'Sin dirección');
                    }

                    return null;
                })
                ->disabled()
                ->dehydrated(false)
                ->columnSpan(4),

            Fieldset::make('PRECIOS')
                ->schema([
                    TextInput::make('price_extra')
                        ->label(__('Extra'))
                        ->numeric()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
                        ->placeholder(__('USD$'))
                        ->required(),
                    TextInput::make('price_super')
                        ->label(__('Super'))
                        ->numeric()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
                        ->placeholder(__('USD$'))
                        ->required(),
                    TextInput::make('price_diesel_2')
                        ->label(__('Diesel Premium'))
                        ->numeric()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
                        ->placeholder(__('USD$'))
                        ->required(),
                    TextInput::make('price_eco_plus')
                        ->label(__('Eco País'))
                        ->numeric()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
                        ->placeholder(__('USD$'))
                        ->required(),
                ])
                ->columns(4)
                ->columnSpan(12),
        ];
    }

    protected static function getInspections(?Model $record, Get $get, $operation): array
    {
        return [
            View::make('livewire.livewire-render-1')
                ->viewData([
                    'livewire' => HoseDetailsPanel::class,
                    'params' => [
                        'record' => $record,
                    ],
                ])
                ->visible(fn ($operation) => $operation !== 'create'),
            HrPlaceholder::make(''),
            Grid::make()
                ->schema([
                    Checkbox::make('do_not_update')
                        ->label(__('No realizar cambios'))
                        ->reactive()
                        ->afterStateUpdated(function (Component $livewire, Set $set, $state) {
                            $set('hose_inspections_completed', $state);
                        })
                        ->columnSpanFull(),
                ])
                ->extraAttributes(['class' => 'flex items-center justify-center'])
                ->visible(fn ($operation) => $operation === 'edit')
                ->columns(1),
            HrPlaceholder::make(''),
            Livewire::make(HosesPanel::class, [
                'operation' => $operation,
                'companyId' => $get('company_id'),
                'stationId' => $get('station_id'),
            ])
                ->visible(function (Get $get, $operation) {
                    if (auth()->user()->isAdmin()) {
                        return true;
                    }

                    if ($operation === 'view') {
                        return false;
                    }

                    if ($get('hose_inspections_completed')) {
                        return false;
                    }

                    return $get('company_id') &&
                        $get('station_id') &&
                        $get('price_extra') &&
                        $get('price_super') &&
                        $get('price_diesel_2') &&
                        $get('price_eco_plus');
                }),
            Hidden::make('hose_inspections_completed')
                ->default(null)
                ->dehydrated(false)
                ->required(function ($state, $operation) {
                    if (auth()->user()->isAdmin()) {
                        return false;
                    }

                    return $state == false || $operation === 'create';
                }),
        ];
    }

    protected static function getAdditionalInspections(): array
    {
        return [
            Fieldset::make(__('Inspección de servicios complementarios').':')
                ->schema([
                    CheckboxList::make('complementary_services')
                        ->label('')
                        ->relationship(
                            'complementaryServicesMany',
                            'description',
                            fn (Builder $query) => $query->orderBy('code')
                        )
                        ->visible(fn (Get $get, $operation) => auth()->user()->isAdmin() || $operation === 'view' || ! empty($get('hose_inspections_completed')))
                        ->required()
                        ->columnSpanFull(),
                ])
                ->columnSpan(3),
            Fieldset::make(__('Observaciones ambientales').':')
                ->schema([
                    CheckboxList::make('environmental_observations')
                        ->label('')
                        ->relationship(
                            'environmentalObservationsMany',
                            'description',
                            fn (Builder $query) => $query->orderBy('code')
                        )
                        ->visible(fn (Get $get, $operation) => auth()->user()->isAdmin() || $operation === 'view' || ! empty($get('hose_inspections_completed')))
                        ->required()
                        ->columnSpanFull(),
                ])
                ->columnSpan(3),
            Fieldset::make(__('Observaciones cumplimiento baños').':')
                ->schema(fn ($record) => [
                    View::make('livewire.livewire-render-2')
                        ->viewData([
                            'livewire' => BathroomsPanel::class,
                            'params' => [
                                'relationName' => 'bathroom_compliance_observations',
                                'bathrooms' => BathroomComplianceObservation::query()
                                    ->orderBy('code')
                                    ->pluck('description', 'id')
                                    ->all(),
                            ],
                        ]),
                ])
                ->columns(1)
                ->columnSpan(6),
        ];
    }

    protected static function getFinalDetails(): array
    {
        return [
            Fieldset::make('')
                ->schema([
                    TextInput::make('serafin_code')
                        ->label(__('Código SERAFÍN'))
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
                        ->extraInputAttributes(['class' => 'text-center'])
                        ->required(),
                ])
                ->columns(1)
                ->columnSpan(2),
            Fieldset::make('')
                ->schema([
                    Toggle::make('allowed_to_place_calibration_seals')
                        ->label(__('Se permitió colocar sellos de calibración?'))
                        ->inline(false)
                        ->default(true),
                ])
                ->columns(1)
                ->columnSpan(3),
            MarkdownEditor::make('inspector_notes')
                ->label(__('Additional Observations'))
                ->columnSpan('full'),
        ];
    }
}
