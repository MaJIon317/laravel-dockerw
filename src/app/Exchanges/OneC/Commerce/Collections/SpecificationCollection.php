<?php


namespace App\Exchanges\OneC\Commerce\Collections;


use App\Exchanges\OneC\Commerce\Model\Simple;

/**
 * Class SpecificationCollection
 *
 * @package App\Exchanges\OneC\Commerce\Model
 */
class SpecificationCollection extends Simple
{
    public function init(): void
    {
        if (isset($this->xml->ХарактеристикаТовара)) {
            foreach ($this->xml->ХарактеристикаТовара as $specification) {
                $this->append(new Simple($this->owner, $specification));
            }
        }
        parent::init();
    }
}