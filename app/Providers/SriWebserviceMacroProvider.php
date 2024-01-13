<?php

namespace App\Providers;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class SriWebserviceMacroProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Http::macro('sriBaseWebserviceWrapper', function (): PendingRequest {
            return Http::withHeaders([
                'Accept' => 'application/json',
            ])
                ->withOptions([
                    'version' => config('dorsi.webservices_sri.macro.persona.debug'),
                    'debug' => config('dorsi.webservices_sri.macro.persona.debug'),
                ])
                ->timeout(config('dorsi.webservices_sri.macro.persona.timeout'))
                ->retry(config('dorsi.webservices_sri.macro.persona.retry'), 100);
        });
    }
}
