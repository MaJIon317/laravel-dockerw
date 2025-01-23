<?php

namespace App\Models;

use App\AttributeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Exchanges\OneC\Interfaces\WarehouseInterface;

class Warehouse extends Model implements WarehouseInterface
{
    use HasFactory, AttributeTrait;

    /**
     * Создание списка складов
     * в параметр передаётся массив всех сладов (import.xml > Классификатор > склады)
     *
     * @param $warehouses
     * @param $source_id
     *
     * @return void
     */
    public static function createWarehouse1c($warehouses, $source_id)
    {
        //
    }
}
