<?php

namespace App\Exchanges\OneC\Commerce\Model;

class OfferPackage extends Simple
{
    /**
     * @var Offer[]
     */
    protected $offers = [];

    /**
     * @var Simple[] array
     */
    protected $priceTypes = [];

    public function propertyAliases()
    {
        return array_merge(parent::propertyAliases(), [
            'СодержитТолькоИзменения' => 'containsOnlyChanges'
        ]);
    }

    public function loadXml()
    {
        return $this->owner->offersXml->ПакетПредложений ?? null;
    }

    /**
     * @return Offer[]
     */
    public function getOffers()
    {
        if (empty($this->offers) && $this->xml && $this->xml->Предложения) {
            foreach ($this->xml->Предложения->Предложение as $offer) {
                $this->offers[] = new Offer($this->owner, $offer);
            }
        }
        return $this->offers;
    }

    /**
     * @return Simple[]
     */
    public function getPriceTypes()
    {
        if (empty($this->priceTypes) && $this->xml) {
            foreach ($this->xpath('//c:ТипыЦен/c:ТипЦены') as $type) {
                $this->priceTypes[] = new Simple($this->owner, $type);
            }
        }
        return $this->priceTypes;
    }

    /**
     * @param $id
     * @return null|Offer
     */
    public function getOfferById($id)
    {
        foreach ($this->getOffers() as $offer) {
            if ($offer->getClearId() === $id) {
                return $offer;
            }
        }
        return null;
    }

    /**
     * @param $id
     * @return Offer[]
     */
    public function getOffersById($id)
    {
        $result = [];
        foreach ($this->getOffers() as $offer) {
            if ($offer->getClearId() === $id) {
                $result[] = $offer;
            }
        }
        return $result;
    }
}