<?php

namespace App\Livewire\User;

use Livewire\Component;

class Orders extends Component
{
    public function render()
    {
        return view('user.orders')->layoutData([
            'title' => __('Orders')
        ])->layout('layouts.user');
    }
}


