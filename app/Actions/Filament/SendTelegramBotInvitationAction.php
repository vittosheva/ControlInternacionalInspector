<?php

namespace App\Actions\Filament;

use App\Mail\TelegramInvitationMail;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Mail;

class SendTelegramBotInvitationAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'sendTelegramBotInvitation';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Send Telegram Bot Invitation'))
            ->icon('heroicon-s-paper-airplane')
            ->outlined(false)
            ->color(Color::Blue)
            ->action(function ($record) {
                Mail::to($record->email)
                    ->locale(config('app.locale'))
                    ->send(
                        (new TelegramInvitationMail(
                            filament()->getTenant()->getAttributeValue('name'),
                            $record->business_name,
                            $record->email,
                        ))->afterCommit()
                    );

                Notification::make()
                    ->title(__('Telegram invitation was successfully sent'))
                    ->success()
                    ->color(Color::Green)
                    ->send();
            })
            ->requiresConfirmation()
            ->disabled(fn ($record) => filled($record->telegram_chat_id));
    }
}
