<?php

use Illuminate\Support\Str;

return [
    'prefix' => 'exchange',

    'exchanges' => [
        '1c' => [
            'debug_bar' => false,
            'path' => '1c',
            'session_name' => Str::slug(config('app.name', 'laravel'), '_') . '_session',
            'import_dir' => storage_path('app/exchanges/1c'),
            'login' => env('EXCHANGE_1C_LOGIN', 'admin'),
            'password' => env('EXCHANGE_1C_PASSWORD', 'admin'),
            'use_zip' => false,
            'file_part' => 0,
            'models' => [
                \App\Exchanges\OneC\Interfaces\WarehouseInterface::class => \App\Models\Warehouse::class,
                \App\Exchanges\OneC\Interfaces\GroupInterface::class => \App\Models\Category::class,
                \App\Exchanges\OneC\Interfaces\ProductInterface::class => \App\Models\Product::class,
                \App\Exchanges\OneC\Interfaces\PriceTypeInterface::class => \App\Models\ProductPriceType::class,
                \App\Exchanges\OneC\Interfaces\OfferInterface::class => \App\Models\ProductOffer::class,

                \App\Exchanges\OneC\Interfaces\OrderInterface::class => \App\Models\Order::class,
            ],
        ]
    ],
    'debug_bar' => [
       // 'OneC\Controller',
    ],
];