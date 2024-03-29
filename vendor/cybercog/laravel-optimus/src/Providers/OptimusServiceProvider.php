<?php

/*
 * This file is part of Laravel Optimus.
 *
 * (c) Anton Komarev <anton@komarev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Cog\Laravel\Optimus\Providers;

use Cog\Laravel\Optimus\OptimusFactory;
use Cog\Laravel\Optimus\OptimusManager;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Jenssegers\Optimus\Optimus;
use Laravel\Lumen\Application as LumenApplication;

class OptimusServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     */
    public function boot(): void
    {
        $this->setupConfig();
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->bindFactory();
        $this->bindManager();
        $this->bindOptimus();
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [
            'optimus',
            'optimus.factory',
            'optimus.connection',
        ];
    }

    /**
     * Setup the config.
     */
    protected function setupConfig(): void
    {
        $source = realpath(__DIR__ . '/../../config/optimus.php');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('optimus.php')], 'config');
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('optimus');
        }

        $this->mergeConfigFrom($source, 'optimus');
    }

    /**
     * Register the factory class.
     */
    protected function bindFactory(): void
    {
        $this->app->singleton('optimus.factory', function () {
            return new OptimusFactory();
        });

        $this->app->alias('optimus.factory', OptimusFactory::class);
    }

    /**
     * Register the manager class.
     */
    protected function bindManager(): void
    {
        $this->app->singleton('optimus', function (Container $app) {
            $config = $app['config'];
            $factory = $app['optimus.factory'];

            return new OptimusManager($config, $factory);
        });

        $this->app->alias('optimus', OptimusManager::class);
    }

    /**
     * Register the bindings.
     */
    protected function bindOptimus(): void
    {
        $this->app->bind('optimus.connection', function (Container $app) {
            $manager = $app['optimus'];

            return $manager->connection();
        });

        $this->app->alias('optimus.connection', Optimus::class);
    }
}
