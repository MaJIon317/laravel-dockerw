<?php

namespace App\Models;

use App\AttributeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Exchanges\OneC\Interfaces\PriceTypeInterface;

class ProductPriceType extends Model implements PriceTypeInterface
{
    use HasFactory, AttributeTrait;

    /**
     * Создание списка типов цен
     * в параметр передаётся массив всех типов цен (import.xml > Классификатор > ТипыЦен)
     *
     * @param $priceTypes
     * @param $source_id
     *
     * @return void
     */
    public static function createPriceTypes1c($priceTypes, $source_id)
    {

    }
}
