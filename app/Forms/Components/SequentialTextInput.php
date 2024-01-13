<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;

class SequentialTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Sequential'))
            ->hintIcon('heroicon-o-information-circle', __('Sequential is assembled according to Establishment and Emission Point fields.'))
            ->disabled()
            ->formatStateUsing(fn (Get $get, Set $set) => $set('visual_sequential', $get('sequential')))
            ->extraInputAttributes(['class' => 'text-center'])
            ->numeric()
            ->default(0)
            ->rules([
                'numeric',
                'gte:0',
                'min:0',
                'regex:/^[0-9]+$/',
                'max:999999999',
            ])
            ->mask('999999999')
            ->placeholder('000000000')
            ->dehydrated(false);
    }
}
