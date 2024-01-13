<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;

class EmployeeAssignmentSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Employee Assignment'))
            ->relationship('assignments', 'name', fn (Builder $query) => $query
                ->select([
                    'id', 'name', 'virtual_name_identification_number', 'virtual_user_id_name',
                ])
            )
            ->multiple();
    }
}
