<?php

namespace App\Exchanges\OneC\Commerce\Model;

use SimpleXMLElement;

class Order extends Simple
{
    /**
     * @var Document[]
     */
    public $documents = [];

     /**
     * @return SimpleXMLElement|null
     */
    public function loadXml(): ?SimpleXMLElement
    {
        if ($this->owner->ordersXml) {
            foreach ($this->owner->ordersXml->Документ as $document) {
                $this->documents[] = new Document($this->owner, $document);
            }
        }
        
        return $this->owner->ordersXml ?? null;
    }
}