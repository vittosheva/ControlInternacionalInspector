<?php

namespace App\Actions\Filament;

use App\Events\Sri\SriConsumeProcessEvent;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\IconSize;

class SendToSRIAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'sendToSRI';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Send to SRI'))
            ->icon('lucide-send')
            ->iconSize(IconSize::Small)
            ->color(Color::Sky)
            ->action(function ($record) {

                // Send Document To SRI
                event(
                    new SriConsumeProcessEvent(
                        $record->company_id,
                        $record->id,
                        $record->document_code,
                        $record->document_type_code,
                        filament()->getTenant()->getAttributeValue('environment_id'),
                        $record->document_code->version(),
                    )
                );

                Notification::make()
                    ->title('Envío al SRI')
                    ->body(__('The background process of sending to SRI has started'))
                    ->success()
                    ->color(Color::Green)
                    ->send();
            });
    }
}
