<?php

namespace App\Actions\Filament;

use Filament\Actions\Action;
use Filament\Support\Colors\Color;

class ClearFormAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Clear'))
            ->outlined(false)
            ->color(Color::Slate)
            ->requiresConfirmation();
    }
}
