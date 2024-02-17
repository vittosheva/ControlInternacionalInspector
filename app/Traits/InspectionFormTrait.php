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
use App\Models\Persona\User;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Livewire;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\View;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;

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
                ->options(
                    DB::connection(Company::getModel()->getConnectionName())
                        ->table(Company::getModel()->getTable())
                        ->oldest('name')
                        ->pluck('name', 'id')
                        ->toArray()
                )
                ->live(onBlur: true)
                ->afterStateUpdated(function (Set $set, $state, Component $livewire) {
                    $company = DB::connection(Company::getModel()->getConnectionName())
                        ->table(Company::getModel()->getTable())
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
                        'company_id' => $state,
                        'station_id' => null,
                    ]);
                })
                ->preload()
                ->searchable(false)
                ->selectablePlaceholder(false)
                ->required()
                ->columnSpan(3),

            Select::make('station_id')
                ->label(__('Gas Station'))
                ->options(function (Get $get, $operation) {
                    if (empty($get('company_id'))) {
                        return [];
                    }

                    $stations = DB::connection(Station::getModel()->getConnectionName())
                        ->table(Station::getModel()->getTable())
                        ->where('company_id', '=', $get('company_id'));

                    if ($operation === 'create') {
                        $stations = $stations
                            ->whereNotIn('id', function (\Illuminate\Database\Query\Builder $query) use ($get) {
                                $query
                                    ->select('station_id')
                                    ->from(ControlRecord::getModel()->getTable())
                                    ->where('year', '=', date('Y'))
                                    ->where('month', '=', date('n'))
                                    ->where('company_id', '=', $get('company_id'));
                            });
                    }

                    return $stations
                        ->orderBy('name')
                        ->distinct()
                        ->pluck('name', 'id')
                        ->toArray();
                })
                ->live(onBlur: true)
                ->disableOptionWhen(fn (Get $get) => blank($get('company_id')))
                ->afterStateUpdated(function (Get $get, Set $set, $state, Component $livewire) {
                    $station = DB::connection(Station::getModel()->getConnectionName())
                        ->table(Station::getModel()->getTable())
                        ->select([
                            'stations.id', 'stations.company_id', 'stations.street', 'stations.station_manager_name', 'stations.station_manager_signature',
                            'companies.price_extra', 'companies.price_super', 'companies.price_diesel_1', 'companies.price_diesel_2', 'companies.price_eco_plus',
                        ])
                        ->leftJoin('companies', 'companies.id', '=', 'stations.company_id')
                        ->where('stations.id', '=', $state)
                        ->first();

                    $set('address', $station->street ?? 'Sin dirección');

                    $set('price_extra', $station->price_extra ?? null);
                    $set('price_super', $station->price_super ?? null);
                    $set('price_diesel_2', $station->price_diesel_2 ?? null);
                    $set('price_eco_plus', $station->price_eco_plus ?? null);

                    $set('station_manager_name', $station->station_manager_name ?? null);
                    $set('station_manager_signature', $station->station_manager_signature ?? null);

                    $livewire->validateOnly('price_extra');
                    $livewire->validateOnly('price_super');
                    $livewire->validateOnly('price_diesel_2');
                    $livewire->validateOnly('price_eco_plus');

                    $livewire->dispatch('clearHoses', [
                        'company_id' => $get('company_id'),
                        'station_id' => $state,
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
                        $street = DB::connection(Station::getModel()->getConnectionName())
                            ->table(Station::getModel()->getTable())
                            ->find($get('station_id'), ['id', 'street']);

                        if (! empty($street->street)) {
                            return $street->getAttributeValue('street');
                        }

                        return $set('address', 'Sin dirección');
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
                ->visible(fn ($operation) => $operation === 'view'),
            HrPlaceholder::make('')
                ->visible(fn ($operation) => $operation === 'view'),
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
            HrPlaceholder::make('')
                ->visible(fn ($operation) => $operation === 'edit'),
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

                    if ($get('do_not_update')) {
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

    protected static function getTanks(): array
    {
        return [
            Fieldset::make(__('Medidas de Tanques').':')
                ->schema([
                    Repeater::make('tank_measurements')
                        ->label('')
                        ->relationship('measurementTanks')
                        ->schema([
                            Select::make('oil')
                                ->label(__('Combustible'))
                                ->options([
                                    'Super' => 'Super',
                                    'Ecopais' => 'Ecopais',
                                    'Extra' => 'Extra',
                                    'Diesel' => 'Diesel',
                                ])
                                ->preload()
                                ->searchable(false)
                                ->required(),
                            TextInput::make('product')
                                ->label(__('Producto (cm³)'))
                                ->default(0)
                                ->required(),
                            TextInput::make('water')
                                ->label(__('Agua (cm³)'))
                                ->default(0)
                                ->required(),
                        ])
                        ->addActionLabel('+ Añadir')
                        ->cloneable()
                        ->collapsible(false)
                        ->defaultItems(0)
                        ->orderColumn('order')
                        ->columns(3)
                        ->columnSpanFull(),
                ])
                ->columnSpan(6),
            Fieldset::make(__('Medidas sacadas').':')
                ->schema([
                    Repeater::make('measurement_draw_outs')
                        ->label('')
                        ->relationship('measurementDrawOuts')
                        ->schema([
                            Select::make('oil')
                                ->label(__('Combustible'))
                                ->options([
                                    'Super' => 'Super',
                                    'Ecopais' => 'Ecopais',
                                    'Extra' => 'Extra',
                                    'Diesel' => 'Diesel',
                                ])
                                ->preload()
                                ->searchable(false)
                                ->required(),
                            TextInput::make('gallons')
                                ->label(__('Galones'))
                                ->default(0)
                                ->required(),
                        ])
                        ->addActionLabel('+ Añadir')
                        ->cloneable()
                        ->collapsible(false)
                        ->defaultItems(0)
                        ->orderColumn('order')
                        ->columns()
                        ->columnSpanFull(),
                ])
                ->columnSpan(6),
        ];
    }

    protected static function getObservations(): array
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
                        ->visible(fn (Get $get, $operation) => $operation === 'view' || auth()->user()->isAdmin() || ! empty($get('hose_inspections_completed')))
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
                        ->visible(fn (Get $get, $operation) => $operation === 'view' || auth()->user()->isAdmin() || ! empty($get('hose_inspections_completed')))
                        ->required()
                        ->columnSpanFull(),
                ])
                ->columnSpan(3),
            Fieldset::make(__('Observaciones cumplimiento baños').':')
                ->schema(fn ($record, $operation) => [
                    View::make('livewire.livewire-render-2')
                        ->viewData([
                            'livewire' => BathroomsPanel::class,
                            'params' => [
                                'relationName' => 'bathroom_compliance_observations',
                                'bathrooms' => DB::connection(BathroomComplianceObservation::getModel()->getConnectionName())
                                    ->table(BathroomComplianceObservation::getModel()->getTable())
                                    ->orderBy('code')
                                    ->pluck('description', 'id')
                                    ->all(),
                                'selected' => $record->bathroomComplianceObservations->isNotEmpty() ? $record->bathroomComplianceObservations : [],
                                'operation' => $operation,
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
                ->columnSpan(3),
            Fieldset::make('¿Se permitió colocar sellos de calibración?')
                ->schema([
                    Radio::make('allowed_to_place_calibration_seals')
                        ->label('')
                        ->inline()
                        ->inlineLabel(false)
                        ->options([
                            true => __('Yes'),
                            false => __('No'),
                            null => __('N/A'),
                        ])
                        ->default(true),
                ])
                ->columns(1)
                ->columnSpan(3),
            Fieldset::make('¿Responsable de carta de calibración?')
                ->schema([
                    Radio::make('responsible_for_calibration_letter')
                        ->label('')
                        ->inline()
                        ->inlineLabel(false)
                        ->options([
                            'CIE' => 'CIE',
                            'Control P' => 'Control P',
                            'E/S' => 'E/S',
                        ])
                        ->default('CIE')
                        ->formatStateUsing(fn ($record) => empty($record->responsible_for_calibration_letter) ? 'CIE' : $record->responsible_for_calibration_letter),
                ])
                ->columns(1)
                ->columnSpan(3),
            Section::make(__('Personas presentes en la inspección'))
                ->schema([
                    Fieldset::make(config('app.name'))
                        ->schema([
                            Select::make('created_by')
                                ->label(__('Inspector 1'))
                                ->options(fn ($record) => DB::table(User::getModel()->getTable())
                                    ->when(! empty($record), function (\Illuminate\Database\Query\Builder $query) use ($record) {
                                        return $query->where('id', '=', $record->created_by);
                                    })
                                    ->when(empty($record), function (\Illuminate\Database\Query\Builder $query) {
                                        return $query->where('id', '=', auth()->id());
                                    })
                                    ->pluck('name', 'id')
                                    ->toArray())
                                ->default(auth()->user()->id)
                                ->inlineLabel()
                                ->selectablePlaceholder(false)
                                ->disabled(fn ($operation) => $operation === 'create' || auth()->user()->isInspector()),

                            Select::make('inspector_name_2')
                                ->label(__('Inspector 2'))
                                ->options(fn ($record) => User::query()
                                    ->role('Inspector')
                                    ->withoutRole('Administrador')
                                    ->when(! empty($record), function (Builder $query) use ($record) {
                                        return $query->where('id', '<>', $record->created_by);
                                    })
                                    ->when(empty($record), function (Builder $query) {
                                        return $query->where('id', '<>', auth()->id());
                                    })
                                    ->pluck('name', 'id')
                                    ->toArray())
                                ->default(null)
                                ->inlineLabel(),
                        ])
                        ->columns(1)
                        ->columnSpan(5),
                    Fieldset::make(function ($state, $record, $operation, Get $get) {
                        $text = 'E/S';

                        if ($operation === 'create' && ! empty($get('station_id'))) {
                            $station = DB::connection(Station::getModel()->getConnectionName())
                                ->table(Station::getModel()->getTable())
                                ->find($get('station_id'), ['id', 'name']);

                            if ($station === null) {
                                return $text;
                            }

                            return $text.' "'.$station->name.'"';
                        }

                        if ($operation === 'edit') {
                            return $text.' "'.($record->station->name ?? null).'"';
                        }

                        return $text;
                    })
                        ->relationship('station')
                        ->schema([
                            TextInput::make('station_manager_name')
                                ->label(__('Name')),
                            SignaturePad::make('station_manager_signature')
                                ->label(__('Signature'))
                                ->dotSize(2.0)
                                ->lineMinWidth(0.5)
                                ->lineMaxWidth(2.5)
                                ->throttle(16)
                                ->minDistance(1)
                                ->velocityFilterWeight(0.7),
                        ])
                        ->columns(1)
                        ->columnSpan(7),
                ])
                ->collapsed(false)
                ->collapsible()
                ->columns(12)
                ->columnSpanFull(),
            Section::make(__('Additional Observations'))
                ->schema([
                    MarkdownEditor::make('inspector_notes')
                        ->label(__('Notes'))
                        ->columnSpan('full'),
                ])
                ->collapsed(false)
                ->collapsible()
                ->columnSpanFull(),
        ];
    }
}
