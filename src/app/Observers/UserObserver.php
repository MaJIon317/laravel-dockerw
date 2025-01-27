<?php

namespace App\Observers;

use App\Models\User;
use App\Jobs\WelcomeEmailJob;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        if (!$user->email_verified_at) {
            $user->sendEmailVerificationNotification();
        }
    }

    /**
     * Handle the User "updated" event. 
     */
    public function updated(User $user): void
    {
        if (!$user->send_welcome && $user->email_verified_at) {
            WelcomeEmailJob::dispatch($user); // Отправим приветсвенное письмо клиенту
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
