<?php

namespace App\Tables\Columns;

use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Columns\ToggleColumn;

class IsActiveColumn extends ToggleColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Is Active?'))
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
