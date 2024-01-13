<?php

namespace App\Listeners;

use App\Notifications\Visualbuilder\EmailTemplates\UserVerifiedNotification;

class UserVerifiedListener
{
    /**
     * Handle the event.
     */
    public function handle($event): void
    {
        $user = $event->user;
        $user->notify(new UserVerifiedNotification());
    }
}
