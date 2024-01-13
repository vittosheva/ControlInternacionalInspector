<?php

namespace App\Forms\Components;

use App\Models\Setting\BranchOffice;
use App\Models\Setting\EmissionPoint;
use App\Models\Setting\Sequential;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class EmissionPointSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Emission Point'))
            ->relationship('emissionPointAssignment', 'virtual_name', fn (Builder $query, Get $get) => $query
                ->select(EmissionPoint::getModel()->qualifyColumns(['id', 'code', 'virtual_name']))
                ->where(BranchOffice::getModel()->qualifyColumn('establishment'), '=', $get('establishment'))
            )
            ->searchable(false)
            ->afterStateUpdated(function (Component $livewire, Select $component, Set $set, Get $get) {
                $set('visual_sequential', null);
                $set('sequential', null);

                $livewire->validateOnly($component->getStatePath());

                $sequential = Sequential::getNextNumber($get('document_code'), $get('establishment'), $get('emission_point'), true);

                $set('visual_sequential', $sequential);
                $set('sequential', $sequential);
            })
            ->disableOptionWhen(fn (Get $get): bool => empty($get('establishment')))
            ->selectablePlaceholder(false)
            ->required();
    }
}
