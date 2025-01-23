<?php
return [
    'route' => env('ADMIN_ROUTE', 'cp'),
    'route_exclude' => [
        'admin.login',
        'admin.login.execute',
        'admin.logout'
    ],
    'limit' => 20,
];