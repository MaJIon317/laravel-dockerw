<?php

namespace App\Models;

use App\AttributeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Exchanges\OneC\Interfaces\OfferInterface;

class ProductOffer extends Model implements OfferInterface
{
    use HasFactory, AttributeTrait;

    /**
     * @param mixed|null $context
     *
     * @return array
     */ 
    public function getExportFields1c($context = null)
    {

    }


    /**
     * @return GroupInterface
     */
    public function getGroup1c()
    {

    }

    /**
     * offers.xml > ПакетПредложений > Предложения > Предложение > Цены.
     *
     * Цена товара,
     * К $price можно обратиться как к массиву, чтобы получить список цен (Цены > Цена)
     * $price->type - тип цены (offers.xml > ПакетПредложений > ТипыЦен > ТипЦены)
     *
     * @param Price $price
     *
     * @return void
     */
    public function setPrice1c($price)
    {

    }

    /**
     * @param $types
     *
     * @return void
     */
    public static function createPriceTypes1c($types)
    {

    }

    /**
     * offers.xml > ПакетПредложений > Предложения > Предложение > ХарактеристикиТовара > ХарактеристикаТовара.
     *
     * Характеристики товара
     * $name - Наименование
     * $value - Значение
     *
     * @param Simple $specification
     *
     * @return void
     */
    public function setSpecification1c($specification)
    {

    }
}
