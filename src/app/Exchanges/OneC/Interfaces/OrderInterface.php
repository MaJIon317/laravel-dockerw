<?php

namespace App\Exchanges\OneC\Interfaces;

interface OrderInterface
{
    /**
     * Список заказов с сайта.
     *
     * @return OrderInterface[]
     */
    public static function findOrders1c();

    /**
     * Список предложений в этом заказе.
     *
     * @return OfferInterface[]
     */
    public function getOffers1c();

    /**
     * Получить список реквизитов в заказе.
     *
     * @return mixed
     */
    public function getRequisites1c();

    /**
     * Получаем контрагента у документа.
     *
     * @return PartnerInterface
     */
    public function getPartner1c();
}