<?php

namespace App\Packages\Filament;

use App\Actions\Filament\ClearFormAction;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;

trait CreateRecordTrait
{
    protected function getFormActions(): array
    {
        return [
            ClearFormAction::make('clear')
                ->action(function () {
                    $this->fillForm();

                    Notification::make()
                        ->title(__('The form has been cleared'))
                        ->success()
                        ->send();
                }),
            ...parent::getFormActions(),
        ];
    }

    protected function getCreatedNotification(): ?Notification
    {
        $title = $this->getCreatedNotificationTitle();

        if (blank($title)) {
            return null;
        }

        return Notification::make()
            ->success()
            ->color(Color::Green)
            ->title($title);
    }

    protected function getRedirectUrl(): string
    {
        $record = $this->getRecord();

        if (empty($record) || $record->wasChanged()) {
            return app(static::getResource())::getUrl('index');
        }

        return app(static::getResource())::getUrl('edit', ['record' => $record]);
    }
}
