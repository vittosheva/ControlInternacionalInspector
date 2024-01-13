<?php

namespace App\Listeners;

use App\Notifications\Visualbuilder\EmailTemplates\UserLoginNotification;

class UserLoginListener
{
    /**
     * Handle the event.
     */
    public function handle($event): void
    {
        $user = $event->user;
        $user->notify(new UserLoginNotification());
    }
}
