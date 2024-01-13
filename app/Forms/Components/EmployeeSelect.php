<?php

namespace App\Forms\Components;

use App\Filament\SuperAdmin\Resources\EmployeeResource;
use App\Models\Persona\User;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Builder;

class EmployeeSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Employee'))
            ->relationship('employee', 'name', fn (Builder $query) => $query
                ->select([
                    ...User::getModel()->getFillable(),
                    'id',
                ])
            )
            ->searchable(['name', 'identification_number', 'user_id'])
            ->createOptionModalHeading(__('Create New Employee'))
            ->editOptionModalHeading(__('Edit Employee'))
            ->manageOptionForm(fn (Form $form) => EmployeeResource::form($form, false))
            ->manageOptionActions(fn (Action $action) => $action->modalWidth(MaxWidth::SevenExtraLarge));
    }
}
