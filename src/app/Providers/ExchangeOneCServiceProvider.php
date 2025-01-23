<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use App\Exchanges\OneC\Config;
use App\Exchanges\OneC\ModelBuilder;
use App\Exchanges\OneC\Interfaces\ModelBuilderInterface;
use Illuminate\Support\ServiceProvider;

class ExchangeOneCServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Config::class, function ($app) {
            return new Config($app['config']['exchange']['exchanges']['1c']);
        });

        $this->app->singleton(ModelBuilderInterface::class, function ($app) {
            return $app[ModelBuilder::class];
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [
            Config::class, 
            ModelBuilderInterface::class, 
            ModelBuilder::class
        ];
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
