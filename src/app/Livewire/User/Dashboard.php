<?php

namespace App\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('user.dashboard')->layoutData([
            'title' => __('user.dashboard'),
        ])->layout('layouts.user');
    }
}
