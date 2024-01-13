<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;

class DueDatesFieldset extends Fieldset
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Credit Dates'))
            ->schema([
                TextInput::make('credit_days')
                    ->label(__('Credit Days'))
                    ->numeric()
                    ->live(onBlur: true)
                    ->default(0)
                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                        $now = now();

                        if ($state > 0) {
                            $set('visual_due_date', $now->addDays($state)->format('Y-m-d'));
                        } else {
                            $set('visual_due_date', $now->format('Y-m-d'));
                        }

                        $set('due_date', $get('visual_due_date'));
                    }),
                TextInput::make('visual_due_date')
                    ->label(__('Collection Date'))
                    ->default(now()->format('Y-m-d'))
                    ->readOnly()
                    ->extraInputAttributes(['class' => 'text-center !bg-gray-50'])
                    ->formatStateUsing(fn (Get $get) => $get('due_date'))
                    ->dehydrated(false),
                Hidden::make('due_date'),
            ]);
    }
}
