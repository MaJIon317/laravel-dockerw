<?php

namespace App\Exchanges\OneC\Interfaces;

use App\Exchanges\OneC\Commerce\Model\Price;
use App\Exchanges\OneC\Commerce\Model\Simple;

interface OfferInterface extends ExportFieldsInterface
{
    /**
     * @return GroupInterface
     */
    public function getGroup1c();

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
    public function setPrice1c($price);

    /**
     * @param $types
     *
     * @return void
     */
    public static function createPriceTypes1c($types);

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
    public function setSpecification1c($specification);
}