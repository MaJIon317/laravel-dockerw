<?php


namespace App\Exchanges\OneC\Commerce\Collections;


use App\Exchanges\OneC\Commerce\Model\Simple;

/**
 * Class ValueProperties
 *
 * @package App\Exchanges\OneC\Commerce\Model
 */
class RequisiteCollection extends Simple
{
    public function init(): void
    {
        if (isset($this->xml->ЗначениеРеквизита)) {
            foreach ($this->xml->ЗначениеРеквизита as $requisite) {
                $this->append(new Simple($this->owner, $requisite));
            }
        }
        parent::init();
    }

}