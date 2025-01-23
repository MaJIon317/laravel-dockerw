<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


// Cron
// Schedule::command('uploading-users')->hourly();

// Schedule::command('uploading-news')->daily();

// Schedule::command('uploading-articles')->daily();


// Подгрузка изображений по ФТП
Schedule::command('uploading-product-images')->everyThirtyMinutes();

// Sitemap generator
Schedule::command('generate:sitemap')->hourly();