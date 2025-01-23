<?php

namespace App\Livewire\Cart;

use Livewire\Attributes\Validate;
use App\Facades\Order;
use App\Models\CouponHistory;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Facades\Cart; 

class Checkout extends Component
{
    public int $user_id;

    #[Validate('sometimes|nullable|min:3|max:200')]
    public string $inn;

    #[Validate('required|min:3|max:200')]
    public string $email;

    #[Validate('required|min:3|max:200')]
    public string $name;

    #[Validate('min:9')] 
    public string $phone;

    #[Validate('required|min:3|max:200')]
    public string $city;

    #[Validate('sometimes|nullable|min:3|max:300')]
    public string $address;

    #[Validate('')]
    public string $comment;

    #[Validate('required')]
    public string $delivery = 'define';

    #[Validate('required')]
    public string $payment = 'define';

    
    public $notCheckout;
    public $carts;
    public $totals;

    /**
     * Mounts the component on the template.
     *
     * @return void
     */
    public function mount(string $code = null): void
    {
        $user = Auth::user();

        $this->user_id = $user->id;
        $this->inn = $user->inn ?? '';
        $this->name = $user->name ?? '';
        $this->phone = $user->phone ?? '';
        $this->email = $user->email ?? '';
        $this->city = $user->city ?? '';
        $this->address = $user->address ?? '';
        $this->comment = $user->comment ?? '';
 
        $this->carts = Cart::content();
        $this->totals = Cart::totals();

        $this->notCheckout = Cart::checkoutStatus();

        if (count($this->notCheckout) > 0) {
            $this->redirectRoute('cart');
        }
    }

    public function create()
    {
        $this->validate();
    
        $order = Order::create(collect($this->all()));

        Cart::clear();

        $this->dispatch('toast', message: __('checkout.message'));

        $this->redirectRoute('dashboard.order.info', $order->id);
    }

    public function render()
    {
        return view('cart.checkout')
            ->layoutData([
                'title' => __('Checkout'),
                'back' => [
                    'link' => route('cart'),
                    'name' => __('Back to the cart')
                ]
            ]);
    }
}
