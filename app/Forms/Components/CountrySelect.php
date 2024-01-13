<?php

namespace App\Forms\Components;

use App\Models\Locale\Country;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Builder;

class CountrySelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Country'))
            ->relationship('country', 'name', fn (Builder $query) => $query
                ->select([
                    ...Country::getModel()->getFillable(),
                    'id',
                ])
                ->where('id', '=', 64)
            )
            ->preload()
            ->createOptionModalHeading(__('Create New Country'))
            ->editOptionModalHeading(__('Edit Country'))
            ->manageOptionActions(fn (Action $action) => $action->modalWidth(MaxWidth::Large))
            ->when(auth()->user()->isAdmin(), function (CountrySelect $stateField) {
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
