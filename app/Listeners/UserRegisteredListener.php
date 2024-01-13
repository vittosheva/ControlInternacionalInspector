<?php

namespace App\Listeners;

use App\Notifications\Visualbuilder\EmailTemplates\UserRegisteredNotification;

class UserRegisteredListener
{
    /**
     * Handle the event.
     */
    public function handle($event): void
    {
        if (config('filament-email-templates.send_emails.new_user_registered')) {
            $user = $event->user;
            $user->notify(new UserRegisteredNotification());
        }
    }
}
