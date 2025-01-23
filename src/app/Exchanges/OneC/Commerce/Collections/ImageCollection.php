<?php

namespace App\Exchanges\OneC\Commerce\Collections;

use App\Exchanges\OneC\Commerce\Model\Image;
use App\Exchanges\OneC\Commerce\Model\Simple;

/**
 * Class Image
 *
 * @package App\Exchanges\OneC\Commerce\Model
 */
class ImageCollection extends Simple
{
    public function init(): void
    {
        if ($this->xml) {
            foreach ($this->xml as $image) {
                $this->append(new Image($this->owner, $image));
            }
        }
        parent::init();
    }
}
