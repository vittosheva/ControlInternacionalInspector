<?php

namespace App\Listeners\Sri;

class ConsumeSignedXmlToSriListener
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
    public function handle($event): void
    {
        dd($event);
    }
}
