<?php

Route::group(['middleware' => [\Illuminate\Session\Middleware\StartSession::class]], function () {
    Route::match(['get', 'post'], config('exchange.exchanges.1c.path', '1c'), \App\Exchanges\OneC\Controller::class.'@request');
});
