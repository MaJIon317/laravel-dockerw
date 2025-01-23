<?php

namespace App\Exchanges;

use Illuminate\Support\Str;
use Barryvdh\Debugbar\Facades\Debugbar;

abstract class ExchangeController
{
    public $debugBar = false;
    
    public function __construct()
    { 
        $debug_bars = config('exchange.debug_bar', []);
        $debug_bar_controller = in_array(Str::replace('App\\Exchanges\\', '', get_class($this)), $debug_bars);
 
        if ($debug_bars || $debug_bar_controller) {
            Debugbar::{$this->debugBar || $debug_bar_controller ? 'enable' : 'disable'}();
        }
    }
}
