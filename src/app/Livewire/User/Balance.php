<?php

namespace App\Livewire\User;

use Livewire\Component;

class Balance extends Component
{
    public function render()
    {
        return view('user.balance')->layoutData([
            'title' => __('user.menu_balance')
        ])->layout('layouts.user');
    }
}
