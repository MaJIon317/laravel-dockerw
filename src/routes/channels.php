<?php
use App\Models\Order;
use App\Models\User;

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('orders.refresh.{userId}', function (User $user, int $userId) {
    return $user->id === $userId;
});

Broadcast::channel('orders.order.update.{orderId}', function (User $user, int $orderId) {
    return $user->id === Order::findOrNew($orderId)->user_id;
});