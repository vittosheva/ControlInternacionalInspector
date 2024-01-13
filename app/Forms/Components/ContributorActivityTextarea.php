<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Textarea;

class ContributorActivityTextarea extends Textarea
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Contributor Activity'))
            ->string()
            ->rows(6)
            ->maxLength(65535);
    }
}
