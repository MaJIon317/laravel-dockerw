<?php

namespace App\Exchanges\OneC\Interfaces;

interface PriceTypeInterface
{
    /**
     * Создание списка типов цен
     * в параметр передаётся массив всех типов цен (import.xml > Классификатор > ТипыЦен)
     *
     * @param $priceTypes
     * @param $source_id
     *
     * @return void
     */
    public static function createPriceTypes1c($priceTypes, $source_id);
}