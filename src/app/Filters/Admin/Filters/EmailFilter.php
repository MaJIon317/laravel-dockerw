<?php
namespace App\Filters\Admin\Filters;

class EmailFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('email', 'like', '%' . $value . '%');
    }
}
