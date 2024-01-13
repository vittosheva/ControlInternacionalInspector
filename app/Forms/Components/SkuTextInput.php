<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;

class SkuTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Main Code'))
            ->hintIcon('heroicon-o-information-circle', __('Code to identify the item'))
            ->maxLength(100);
    }
}
