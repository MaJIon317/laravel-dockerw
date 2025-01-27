<?php

namespace App\Observers;

use App\Events\Orders\RefreshEvent;
use App\Events\Orders\OrderUpdateEvent;
use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        try {
            RefreshEvent::dispatch($order->user);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        try {
            OrderUpdateEvent::dispatch($order);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        try {
            RefreshEvent::dispatch($order->user);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
