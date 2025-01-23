<?php

namespace App\Livewire;

use Livewire\Component;

class Modals extends Component
{
    public $key;
    public $params = [];

    protected $listeners = ['showModal'];

    public function showModal(string $key, array $params = [])
    {
        $this->dispatch('resetModal');
        
        $this->key = $key;
        $this->params = $params;

        $this->dispatch('showModalLoad');
    }

    public function render()
    {
        return view('components.modals');
    }
}
