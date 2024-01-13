<?php

namespace App\Forms\Components;

use App\Models\Tax\Tax;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Database\Eloquent\Builder;

class TaxSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('IVA'))
            ->relationship('iva', 'name', fn (Builder $query) => $query
                ->select([
                    ...Tax::getModel()->getFillable(),
                    'id',
                ])
            )
            ->prefixIcon('heroicon-o-currency-dollar')
            ->searchable()
            ->afterStateUpdated(function (TaxSelect $component, $livewire, $state, Set $set, Get $get) {
                $livewire->validateOnly($component->getStatePath());

                return generatePvpPrice($component->getName(), $set, $get);
            })
            ->required();
    }
}
