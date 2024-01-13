<?php

namespace App\Tables\Filters;

use Filament\Tables\Filters\SelectFilter;

class EstablishmentFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Establishment'))
            ->relationship('branchOffice', 'virtual_name')
            ->preload()
            ->multiple();
    }
}
