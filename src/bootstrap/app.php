<?php

use App\Http\Middleware\UtmParameter;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->prefix(config('admin.route'))
                ->namespace('App\\Http\\Controllers\\Admin')
                ->name('admin.')
                ->group(base_path('routes/admin.php'));

            Route::prefix(config('exchange.prefix'))
                ->namespace('App\\Exchanges')
                ->name('exchange.')
                ->group(base_path('routes/exchange.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo('/');

        $middleware->web(append: [
            UtmParameter::class,
        ]);
        
        $middleware->alias([
            'guest.admin' => \App\Http\Middleware\AuthenticateGuestAdmin::class,
            'auth.admin' => \App\Http\Middleware\AuthenticateAdmin::class,
            'permission' => \App\Http\Middleware\ValidPermission::class,
            'filter' => \App\Http\Middleware\Filter::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();