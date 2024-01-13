<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Textarea;

class AddressTextarea extends Textarea
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Address'))
            ->string()
            ->rows(3)
            ->maxLength(65535);
    }
}
