<?php

namespace App\Tables\Filters;

use Filament\Tables\Filters\SelectFilter;

class EmissionPointFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Emission Point'))
            ->relationship('emissionPoint', 'virtual_name')
            ->multiple();
    }
}
