<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use App\Listeners\LoginListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Support\ServiceProvider;

use App\Observers\UserObserver;
use App\Models\User;

use App\Observers\OrderObserver;
use App\Models\Order;

use App\Observers\ProductObserver;
use App\Models\Product;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Login::class => [
            LoginListener::class
        ],
    ];

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
        User::observe(UserObserver::class);
        Order::observe(OrderObserver::class);

        //Product::observe(ProductObserver::class);
    }
}
