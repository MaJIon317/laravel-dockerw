<?php

namespace App\Facades;

use App\Services\WishlistService;
use Illuminate\Support\Facades\Facade;

class Wishlist extends Facade {
    
    protected static function getFacadeAccessor()
    {
        return WishlistService::class;
    }
}