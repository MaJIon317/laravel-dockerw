<?php
namespace App\Filters\Admin;

class UserFilter extends AbstractFilter
{
    protected $filters = [
        'name' => Filters\NameFilter::class,
        'email' => Filters\EmailFilter::class,
        'phone' => Filters\PhoneFilter::class,
    ];
}