<?php

namespace App\Listeners;

use App\Models\Persona\User;
use App\Notifications\AuthTimedOutEmail;
use JulioMotol\AuthTimeout\Events\AuthTimedOut;

class AuthTimedOutListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AuthTimedOut $event): void
    {
        if ($event->user instanceof User) {
            $event->user->notify(new AuthTimedOutEmail());
        }
    }
}
