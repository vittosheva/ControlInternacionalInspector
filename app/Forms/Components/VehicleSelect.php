<?php

namespace App\Forms\Components;

use App\Filament\Inventory\Resources\VehicleResource;
use App\Models\Inventory\Vehicle;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Builder;

class VehicleSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Vehicle'))
            ->relationship('vehicle', 'virtual_name', fn (Builder $query) => $query
                ->select([
                    ...Vehicle::getModel()->getFillable(),
                    'id',
                ])
            )
            ->searchable()
            ->createOptionModalHeading(__('Create New Vehicle'))
            ->editOptionModalHeading(__('Edit Vehicle'))
            ->manageOptionForm(fn (Form $form) => VehicleResource::form($form, false))
            ->manageOptionActions(fn (Action $action) => $action->modalWidth(MaxWidth::SevenExtraLarge));
    }
}
