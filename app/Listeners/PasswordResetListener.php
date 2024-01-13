<?php

namespace App\Listeners;

use App\Notifications\Visualbuilder\EmailTemplates\UserPasswordResetNotification;

class PasswordResetListener
{
    /**
     * Handle the event.
     */
    public function handle($event): void
    {
        $user = $event->user;
        $user->notify(new UserPasswordResetNotification());
    }
}
