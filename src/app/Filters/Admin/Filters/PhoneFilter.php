<?php
namespace App\Filters\Admin\Filters;

class PhoneFilter
{
    public function filter($builder, $value)
    {
        $regex = '';
        $phone = preg_replace('/[^0-9]/', '', $value);
        $len = strlen($phone); 
        for ($i = 0; $i < $len - 1; $i++) {
            $regex .= $phone[$i] . "[^[:digit:]]*";
        }
        $regex .= $phone[$len - 1];
  
        return $builder->where('phone', 'RLIKE', $regex);
    }
}
