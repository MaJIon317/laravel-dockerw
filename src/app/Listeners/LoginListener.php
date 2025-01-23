<?php

namespace App\Listeners;

use App\Notifications\LoginNewIpNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;

class LoginListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $old_ip = $event->user->ip;
        $new_ip = request()->getClientIp();

        // 1. Меняем IP если оно отличается
        if (!$old_ip || ($old_ip != $new_ip)) {
            $event->user->ip = $new_ip;
            $event->user->save();
        }
      
        // 2. Закидываем в очередь отправку уведомления о смене IP
        if ($old_ip && ($old_ip != $new_ip) && $event->user) {
            $event->user->notify(new LoginNewIpNotification($event->user));
        }
    }
}
