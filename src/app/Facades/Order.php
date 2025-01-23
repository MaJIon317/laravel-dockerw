<?php

namespace App\Facades;

use App\Services\OrderService;
use Illuminate\Support\Facades\Facade;

class Order extends Facade {
    
    protected static function getFacadeAccessor()
    {
        return OrderService::class;
    }
}