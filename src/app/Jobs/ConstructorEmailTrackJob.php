<?php

namespace App\Jobs;

use App\Models\EmailConstructorSend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ConstructorEmailTrackJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string|array $messageId,
        public string $url
    ) {
        $this->onQueue('email-constructor-track');

        $this->messageId = email_constructor_decrypt($messageId);
    }
 
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $validator = Validator::make($this->messageId, [
            'email' => 'required|email',
            'email_constructor_id' => 'required|string',
            'key' => 'sometimes|nullable|numeric',
        ]);

        if (!$validator->fails()) {
            $model = EmailConstructorSend::where([
                ['email_constructor_id', $this->messageId['email_constructor_id']],
                ['email', $this->messageId['email']]
            ])->first();

            if ($model) {
                if (!$model->read || ($this->url == route('unsubscribe'))) {
                    $model->read = true;
                    if ($this->url == route('unsubscribe')) {
                        $model->unsubscribe = true;
                    }
                    $model->save();
                }
      
                // Если передается ключ ссылки
                if (isset($this->messageId['key']) && !isset($this->messageId['pixel'])) {
                    if ($modelTrack = $model->tracks()->where('key', (int)$this->messageId['key'])->first()) {
                        $modelTrack->count++;
                        $modelTrack->save();
                    } else {
                        $model->tracks()->create([
                            'key' => (int)$this->messageId['key'],
                        ]);
                    }
                }
            }
        }
    }
}
