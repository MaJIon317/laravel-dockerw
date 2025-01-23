<?php

namespace App\Livewire\User\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Orders extends Component
{
    public $user;

    public $orders;

    public function mount(): void
    {
        $this->user = Auth::user();

        $this->orders = $this->user->orders;
    }

    #[On('echo-private:orders.refresh.{user.id},.orders.refresh.event')]
    public function onOrdersRefreshEvent()
    {
        $this->dispatch('$refresh');
    }

    public function render()
    { 
        return view('user.components.orders');
    }
}
