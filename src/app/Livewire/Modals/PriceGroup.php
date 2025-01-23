<?php

namespace App\Livewire\Modals;

use Livewire\Component;
use App\Facades\Cart;

class PriceGroup extends Component
{
    public int $discount_group_id;
    public $discount_groups;
    public $discount_group;
    public $discount_group_value;

    /**
     * Mounts the component on the template.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->discount_groups = Cart::getDiscountGroups();
        $this->discount_group = $this->discount_groups[$this->discount_group_id] ?? null;
        $this->discount_group_value = Cart::getDiscountGroupValue($this->discount_group_id);
    }

    public function render()
    {
        return view('components.modals.price-group');
    }
}
