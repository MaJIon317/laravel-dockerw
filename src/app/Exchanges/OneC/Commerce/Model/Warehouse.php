<?php

namespace App\Exchanges\OneC\Commerce\Model;

class Warehouse extends Simple
{
    public function propertyAliases()
    {
        return [
            'Ид' => 'id',
            'Количество' => 'quantity',
            'Наименование' => 'name',
        ];
    }

}
