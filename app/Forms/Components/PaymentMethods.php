<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class PaymentMethods extends Field
{
    protected string $view = 'forms.components.payment-methods';

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label('')
            ->columns(12)
            ->columnSpanFull();
    }
}
