<?php

namespace App\Livewire\User\Components;

use App\Exports\OrderWithBarcodes;
use App\Exports\OrderMissingProducts;
use Maatwebsite\Excel\Facades\Excel;

use App\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Order extends Component
{
    public $id = null;
    public $order = null;

    public function mount(): void
    {
        $this->order = Auth::user()->orders->find($this->order ? $this->order->id : $this->id);
    }

    public function cancelOrder()
    {
        if ($this->order->status == 'new') {
            $this->order->status = 'cancelled';
            $this->order->save();
        }
    }

    public function exportWithBarcodes()
    {
        return Excel::download(new OrderWithBarcodes($this->order), 'order-with-barcodes-' . $this->order->id . '.xlsx');
    }

    public function exportMissingProduct()
    {
        return Excel::download(new OrderMissingProducts($this->order), 'order-missing-products-' . $this->order->id . '.xlsx');
    }
    
    public function repeat(int $id)
    {
        Cart::clear();

        if ($this->order->products) {
            foreach ($this->order->products as $product) {
                Cart::add($product->product_id, $product->quantity);
            }

            $this->redirectRoute('cart', navigate: true);
        } else {
            $this->dispatch('toast', type: 'error', message: __('order.error_repeat'));
        }
    }
    
    #[On('echo-private:orders.order.update.{order.id},.orders.order.update.event')]
    public function onOrdersOrderUpdateEvent()
    {
        $this->order = Auth::user()->orders->find($this->order->id);

        $this->dispatch('toast', message: __('Order №:id has been updated', ['id' => $this->order->id]));
    }

    public function render()
    {
        if (!$this->id) {
            return view('user.components.order');
        } else {
            if (!$this->order) {
                $this->redirectRoute('dashboard.orders');

                return <<<'HTML'
                    <div></div>
                    HTML;
            } else {
                return view('user.order')->layoutData([
                    'title' => __('Order №:id from :created_at', 
                        [
                            'id' => $this->order->id, 
                            'created_at' => $this->order->created_at->format('d-m-y H:i')
                        ]
                    ),
                    'back' => [
                        'link' => route('dashboard.orders'),
                    ]
                ])->layout('layouts.user');
            }
        }
    }
}
