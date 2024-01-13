<?php

namespace App\Forms\Components;

use App\Models\Locale\City;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Builder;

class CitySelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('City'))
            ->relationship('city', 'name', function (Builder $query, Get $get) {
                $query = $query
                    ->select([
                        ...City::getModel()->getFillable(),
                        'id',
                    ]);

                if (! empty($get('country_id')) && ! empty($get('state_id'))) {
                    return $query
                        ->where('country_id', '=', $get('country_id'))
                        ->where('state_id', '=', $get('state_id'));
                }

                return $query;
            })
            ->createOptionModalHeading(__('Create New City'))
            ->createOptionUsing(function (Select $component, array $data, ComponentContainer $form, Get $get) {
                $city = City::create([
                    ...$data,
                    'country_id' => $get('country_id'),
                    'state_id' => $get('state_id'),
                ]);

                return $city->getKey();
            })
            ->editOptionModalHeading(__('Edit City'))
            ->manageOptionActions(fn (Action $action) => $action->modalWidth(MaxWidth::Large))
            ->when(auth()->user()->isAdmin(), function (CitySelect $stateField) {
                return $stateField
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label(fn (): string => __('Name'))
                            ->required(),
                    ])
                    ->editOptionForm([
                        TextInput::make('name')
                            ->label(fn (): string => __('Name'))
                            ->required(),
                    ]);
            })
            ->searchable();
    }
}
