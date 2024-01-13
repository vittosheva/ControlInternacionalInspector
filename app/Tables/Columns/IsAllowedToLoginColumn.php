<?php

namespace App\Tables\Columns;

use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Columns\ToggleColumn;

class IsAllowedToLoginColumn extends ToggleColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Is Allowed To Login?'))
            ->alignment(Alignment::Center)
            ->afterStateUpdated(function () {
                Notification::make()
                    ->title(__('Change Done'))
                    ->success()
                    ->color(Color::Green)
                    ->send();
            })
            ->sortable()
            ->toggleable();
    }
}
