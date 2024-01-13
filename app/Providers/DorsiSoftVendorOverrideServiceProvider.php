<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Jenssegers\Optimus\Optimus;

class DorsiSoftVendorOverrideServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Optimus::class, function () {
            return new Optimus(config('optimus.connections.main.prime'), config('optimus.connections.main.inverse'), config('optimus.connections.main.random'));
        });

        $this->app->singleton(\Filament\Http\Responses\Auth\Contracts\LoginResponse::class, \App\Http\Responses\LoginResponse::class);
        $this->app->singleton(\Filament\Http\Responses\Auth\Contracts\LogoutResponse::class, \App\Http\Responses\LogoutResponse::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
