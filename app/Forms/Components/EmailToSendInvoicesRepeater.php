<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Livewire\Component;

class EmailToSendInvoicesRepeater extends Repeater
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Emails to Send Invoices'))
            ->hintIcon('heroicon-o-question-mark-circle', tooltip: __('Tooltip for emails to send invoices'))
            ->simple(
                TextInput::make('email')->email()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
                    ->unique(ignoreRecord: true)
                    ->default(null)
                    ->rules([])
                    ->prefixIcon('heroicon-o-envelope')
                    ->autocomplete('new-password')
                    ->required(),
            )
            ->addActionLabel(__('Add email'))
            //->deleteAction(fn (Action $action) => $action->requiresConfirmation())
            ->defaultItems(0)
            ->default(null);
    }
}
