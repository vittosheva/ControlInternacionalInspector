<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;

class WebsiteTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Website'))
            ->url()
            ->prefixIcon('heroicon-o-globe-alt');
    }
}
