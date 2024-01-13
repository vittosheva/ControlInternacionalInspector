<?php

namespace App\Forms\Components;

use App\Models\Persona\User;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;

class SalespersonSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Salesperson'))
            ->relationship('salesperson', 'name', fn (Builder $query) => $query
                ->select([
                    ...User::getModel()->getFillable(),
                    'id',
                ])
            )
            ->searchable()
            ->prefixIcon('heroicon-o-user');
    }
}
