<?php
return [
    'category_sorts' => [
        'all' => [
            'priceASC',
            'priceDESC',
            'viewASC',
            'viewDESC',
            'titleASC',
            'titleDESC',
            'stockASC',
            'stockDESC',
            'created_atASC',
            'created_atDESC',
        ],
        'default' => [
            'created_atDESC',
            'priceASC',
            'viewASC',
            'titleASC',
            'stockDESC',
        ]
    ],
    'order_statuses' => [
        'new', // Новый
        'processing', // В сборке
        'delivery', // В доставке
        'delivered', // Доставлен
        'completed', // Завершенный
        'cancelled', // Отмененный
    ]
];