<?php

namespace App\Actions\Filament;

use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Storage;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class SendTelegramMessageAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'sendTelegram';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Send Telegram'))
            ->icon('heroicon-s-paper-airplane')
            ->outlined(false)
            ->color(Color::Slate)
            ->action(function ($record, Action $action, Telegram $telegram): void {
                //$bot = $telegram::getMe();
                //$data = $telegram::getUpdates();

                $telegramChatId = $record->customer->telegram_chat_id; // 661894483
                $document = $record->document_code->referenceToXmlName();

                if (! empty($record->pdf) && Storage::disk('pdfs')->exists($record->pdf)) {
                    $telegram::sendDocument([
                        'chat_id' => $telegramChatId,
                        'document' => InputFile::create(Storage::disk('pdfs')->path($record->pdf), $document.'-'.$record->document_number.'.pdf'),
                        'caption' => ucfirst("$document con #$record->document_number fue creado"),
                    ]);
                }

                if (! empty($record->xml) && Storage::disk('xmls_firmados')->exists($record->xml)) {
                    $telegram::sendDocument([
                        'chat_id' => $telegramChatId,
                        'document' => InputFile::create(Storage::disk('xmls_firmados')->path($record->xml), $document.'-'.$record->document_number.'.xml'),
                        'caption' => ucfirst("$document con #$record->document_number fue creado"),
                    ]);
                }

                $telegram::sendMessage([
                    'chat_id' => $telegramChatId,
                    'text' => 'Si desea acceder al sistema '.config('dorsi.project_name').': '.config('dorsi.project_url_customer'),
                ]);

                Notification::make()
                    ->title(__('Sent Telegram successfully'))
                    ->body(fn () => $record->persona_business_name)
                    ->success()
                    ->color(Color::Green)
                    ->send();
            })
            ->requiresConfirmation()
            ->visible(fn ($record) => ! $record->isFinalConsumer())
            ->disabled(function ($record) {
                $persona = $record->document_code->referenceToPersona();

                return blank($record->{$persona}?->telegram_chat_id) || blank($record->pdf);
            });
    }
}
