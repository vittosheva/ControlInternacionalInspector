<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use JulioMotol\AuthTimeout\Middlewares\CheckAuthTimeout;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Settings for dates in Spanish
        Carbon::setLocale(config('app.locale'));
        setlocale(LC_ALL, 'es_ES', 'es', 'ES', 'es_ES.utf8');

        URL::forceScheme('https');

        if (app()->isLocal()) {
            Model::shouldBeStrict();

            DB::whenQueryingForLongerThan(100, function (Connection $connection, QueryExecuted $event) {
                Log::channel('db_slow_queries')->warning('Queries collectively took longer than 1 second.', [
                    'connection' => $connection->getName(),
                    'database' => $connection->getDatabaseName(),
                    'sql' => $connection->getQueryGrammar()->substituteBindingsIntoRawSql($event->sql, $event->bindings),
                    'time' => $event->time.' ms',
                ]);
            });
        }

        CheckAuthTimeout::setRedirectTo(fn () => filament()->getDefaultPanel()->getLoginUrl());

        Password::defaults(function () {
            return Password::min(8)
                ->min(config('dorsi.passwords.min_length'))
                ->when(config('dorsi.passwords.number'), fn (Password $password) => $password->numbers())
                ->when(config('dorsi.passwords.letters'), fn (Password $password) => $password->letters())
                ->when(config('dorsi.passwords.special_character'), fn (Password $password) => $password->symbols())
                ->when(config('dorsi.passwords.mixed_case'), fn (Password $password) => $password->mixedCase())
                ->uncompromised(3);
        });
    }
}
