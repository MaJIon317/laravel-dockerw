<?php

namespace App\Listeners;

use App\Models\EmailConstructorSend;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailConstructorSendListener
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
    public function handle(MessageSent $event): void
    {
        if ($event->message->getHeaders()->get('x-metadata-constructor_id')) {
            $email_constructor_id = (int) $event->message->getHeaders()->get('x-metadata-constructor_id')->getBody();

            foreach ($event->message->getTo() as $email) {
                if ($model = EmailConstructorSend::where([
                    'email_constructor_id' => $email_constructor_id,
                    'email' => $email->getAddress()
                ])->first()) {
                    $model->read = false;
                    $model->count++;
                    $model->save();
                } else {
                    EmailConstructorSend::create([
                        'email_constructor_id' => $email_constructor_id,
                        'email' => $email->getAddress()
                    ]);
                }

            }
        }
    }
}
