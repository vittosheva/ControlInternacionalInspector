<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Select;
use Filament\Forms\Set;
use Livewire\Component;

class EstablishmentSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Establishment'))
            ->relationship(
                fn ($operation) => ($operation === 'create') ? 'establishment' : 'establishmentUpdate',
                'virtual_name',
            )
            ->searchable(false)
            ->afterStateUpdated(function ($state, Set $set, Component $livewire, Select $component) {
                $set('emission_point', null);
                $set('sequential', null);

                $set('visual_sequential', null);

                $livewire->validateOnly($component->getStatePath());
            })
            ->selectablePlaceholder(false)
            ->required();
    }
}
