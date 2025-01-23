<?php

namespace App\Jobs;

use App\Mail\ConstructorEmail;
use App\Models\EmailConstructor;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ConstructorEmailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public User|string $user,
        public EmailConstructor $emailConstructor,
    ) {
        $this->onQueue('email-constructor');
    }

    /**
     * Execute the job. 
     */
    public function handle(): void
    {
        Mail::to(!is_string($this->user) ? $this->user->email : $this->user)->send(new ConstructorEmail(!is_string($this->user) ? $this->user->email : $this->user, $this->emailConstructor));
    }
}
