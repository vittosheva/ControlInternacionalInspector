<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;

class LogHttpConnectionException
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
    public function handle(object $event): void
    {
        Log::error($event->getMessage(), [$event->getTrace()]);
    }
}
