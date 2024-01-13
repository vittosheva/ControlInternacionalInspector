<?php

namespace App\Forms\Components;

use App\Models\Locale\State;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Builder;

class StateSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('State'))
            ->relationship('state', 'name', function (Builder $query, Get $get) {
                $query = $query
                    ->select([
                        ...State::getModel()->getFillable(),
                        'id',
                    ]);

                if (! empty($get('country_id'))) {
                    return $query->where('country_id', '=', $get('country_id'));
                }

                return $query;
            })
            ->createOptionModalHeading(__('Create New State'))
            ->createOptionUsing(function (Select $component, array $data, ComponentContainer $form, Get $get) {
                $state = State::create([
                    ...$data,
                    'country_id' => $get('country_id'),
                ]);

                return $state->getKey();
            })
            ->editOptionModalHeading(__('Edit State'))
            ->manageOptionActions(fn (Action $action) => $action->modalWidth(MaxWidth::Large))
            ->when(auth()->user()->isAdmin(), function (StateSelect $stateField) {
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
