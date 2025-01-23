<?php

namespace App\Providers;

use App\Hashing\BitrixHasher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;

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
        // Checking webp support
        if (!session()->get('webp') && isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false) {
            session()->put('webp', true);
        }

        Hash::extend('bitrix', static function () {
            return new BitrixHasher();
        });
    }
}
