<?php

namespace App\Listeners;

use App\Notifications\Visualbuilder\EmailTemplates\UserLockoutNotification;

class UserLockoutListener
{
    /**
     * Handle the event.
     */
    public function handle($event): void
    {
        $user = $event->user;
        $user->notify(new UserLockoutNotification());
    }
}
