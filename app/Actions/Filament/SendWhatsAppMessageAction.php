<?php

namespace App\Actions\Filament;

use App\Notifications\SendElectronicReceiptWhatsApp;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Storage;

class SendWhatsAppMessageAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'sendWhatsApp';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Send WhatsApp'))
            ->icon('heroicon-s-paper-airplane')
            ->outlined(false)
            ->color(Color::Slate)
            ->action(function ($record, Action $action): void {
                $document = $record->document_code->referenceToXmlName();
                $persona = $record->document_code->referenceToPersona();

                if (empty($record->{$persona}->telephone)) {
                    return;
                }

                if (! empty($record->pdf) && Storage::disk('pdfs')->exists($record->pdf)) {
                    ($record->{$persona})->notify(new SendElectronicReceiptWhatsApp(
                        $record->persona_business_name,
                        $document.' '.$record->document_number,
                        'https://www.sri.gob.ec/o/sri-portlet-biblioteca-alfresco-internet/descargar/435ca226-b48d-4080-bb12-bf03a54527fd/FICHA%20TE%C2%B4CNICA%20COMPROBANTES%20ELECTRO%C2%B4NICOS%20ESQUEMA%20OFFLINE%20Versio%C2%B4n%202.21.pdf',
                    ));
                }

                /*if (! empty($record->xml) && Storage::disk('xmls_firmados')->exists($record->xml)) {

                }*/

                Notification::make()
                    ->title(__('Sent WhatsApp successfully'))
                    ->body(fn () => $record->persona_business_name)
                    ->success()
                    ->color(Color::Green)
                    ->send();
            })
            ->requiresConfirmation()
            ->visible(fn () => auth()->user()->isAdmin())
            ->disabled(fn ($record) => blank($record->pdf));
    }
}
