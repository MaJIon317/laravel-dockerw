<?php

namespace App\Services\Commerce;

/**
 * Class AuthService.
 */
class AuthService
{
    public $result;
    public $source_id;

    /**
     * @throws ExchangeException
     *
     * @return string
     */
    public function checkAuth($login, $password)
    {
        $this->result = true;
        $this->source_id = date('dmY');
        
        return $this;
    }

}