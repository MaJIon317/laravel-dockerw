<?php

use Illuminate\Support\Str;

return [
    'path'                 => '1c-exchange',
    'session_name'         => Str::slug(config('app.name', 'laravel'), '_') . '_session',
    'import_dir'           => storage_path('app/1c'),
    'login'                => 'GTUrty',
    'password'             => 'HhYsjsbgJIau7wjkkKJhevwko7',
    'use_zip'              => false,
    'file_part'            => 0,
    'product_limit'        => 150,
    'product_import_delay' => 4,
    'price' => 'ad29b096-7343-11e8-82b1-be1bb4705fe6',
    'price_sale' => '9366ed08-1da2-11ea-9a1c-be1bb4705fe6',
    'properties' => [
        'discount_group_id' => 'bb97b857-fd5f-11e9-ab99-be1bb4705fe6',
        'minimum' => 'c286063b-4700-11e8-b0d9-be1bb4705ae6',
        'status' => '41cc44f5-38f4-11e9-a5dd-be1bb4705fe6',
        'video' => '898cb41b-2388-11eb-a37e-be1bb4705fe6',
    ],

    'models' => [
        \Jurager\Exchange\Interfaces\WarehouseInterface::class => \App\Models\Warehouse::class,
        \Jurager\Exchange\Interfaces\GroupInterface::class     => \App\Models\Category::class,
        \Jurager\Exchange\Interfaces\ProductInterface::class   => \App\Models\Product::class,
        \Jurager\Exchange\Interfaces\PriceTypeInterface::class => \App\Models\ProductPriceType::class,
        \Jurager\Exchange\Interfaces\OfferInterface::class     => \App\Models\ProductOffer::class,

        \Jurager\Exchange\Interfaces\DocumentInterface::class     => \App\Models\Order::class,
    ],
    
    'services'=> [
        // Раскоментировать, если надо производить отладку
        \Jurager\Exchange\Services\AuthService::class => \App\Services\Commerce\AuthService::class,
    ],
];
