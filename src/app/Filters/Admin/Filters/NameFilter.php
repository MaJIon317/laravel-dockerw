<?php
namespace App\Filters\Admin\Filters;

class NameFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('name', 'like', '%' . $value . '%');
    }
}
