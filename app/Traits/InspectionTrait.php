<?php

namespace App\Traits;

use App\Livewire\ComplementaryServicesPanel;
use App\Livewire\HoseDetailsPanel;
use App\Livewire\HosesPanel;
use App\Models\Inspections\Company;
use App\Models\Inspections\ControlRecord;
use App\Models\Inspections\Station;
use Filament\Forms\Components\Fieldset;
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
use Livewire\Component;

trait InspectionTrait
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
                ->relationship('company', 'name')
                ->afterStateUpdated(function (Set $set, $state) {
                    $company = Company::query()->find($state, [
                        'price_extra',
                        'price_super',
                        'price_diesel_1',
                        'price_diesel_2',
                        'price_eco_plus',
                    ]);

                    $set('station_id', null);

                    $set('price_extra', $company->price_extra ?? null);
                    $set('price_super', $company->price_super ?? null);
                    $set('price_diesel_1', $company->price_diesel_2 ?? null);
                    $set('price_eco_plus', $company->price_eco_plus ?? null);
                })
                ->searchable()
                ->selectablePlaceholder(false)
                ->required()
                ->columnSpan(3),

            Select::make('station_id')
                ->label(__('Gas Station'))
                ->relationship('station', 'name', function (Builder $query, Get $get, $operation) {
                    if ($operation === 'view') {
                        return $query;
                    }

                    if (empty($get('company_id'))) {
                        return $query->whereNull('id');
                    }

                    $stationsWithInspectionsInThisYearAndMonth = ControlRecord::query()
                        ->where('year', '=', date('Y'))
                        ->where('month', '=', date('n'))
                        ->where('company_id', '=', $get('company_id'))
                        ->pluck('station_id')
                        ->toArray();

                    return $query
                        ->where('company_id', '=', $get('company_id'))
                        ->whereNotIn('id', $stationsWithInspectionsInThisYearAndMonth);
                })
                ->disableOptionWhen(fn (Get $get) => blank($get('company_id')))
                ->live()
                ->afterStateUpdated(function (Get $get, Set $set, $state, Component $livewire) {
                    $street = Station::query()
                        ->find($state, ['id', 'street'])
                        ->getAttributeValue('street');

                    $set('address', ! empty($street) ? $street : 'Sin dirección');

                    $livewire->dispatch('clearHoses', ['stationId' => $get('station_id')]);
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

    protected static function getInspections($get, $operation): array
    {
        return [
            Livewire::make(HosesPanel::class, [
                'operation' => $operation,
                'companyId' => $get('company_id'),
                'stationId' => $get('station_id'),
            ])
                ->visible(function (Get $get) use ($operation) {
                    if ($operation === 'view') {
                        return false;
                    }

                    return $get('company_id') &&
                        $get('station_id') &&
                        $get('price_extra') &&
                        $get('price_super') &&
                        $get('price_diesel_1') &&
                        $get('price_eco_plus');
                }),
            Livewire::make(HoseDetailsPanel::class, fn ($record) => [
                'record' => $record,
            ])
                ->visible(fn () => $operation === 'view'),
        ];
    }

    protected static function getAdditionalInspections($operation): array
    {
        return [
            View::make('livewire.livewire-render')
                ->viewData([
                    'livewire' => ComplementaryServicesPanel::class,
                    'params' => [
                        'controlRecord' => new ControlRecord(),
                        'operation' => $operation,
                    ],
                ]),
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
                        ->inline(false),
                ])
                ->columns(1)
                ->columnSpan(3),
            MarkdownEditor::make('inspector_notes')
                ->label(__('Additional Observations'))
                ->columnSpan('full'),
        ];
    }
}
