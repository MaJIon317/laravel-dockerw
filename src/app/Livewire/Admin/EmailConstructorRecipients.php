<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Subscription;
use App\Models\EmailConstructor;
use App\Jobs\ConstructorEmailJob;
use App\Mail\ConstructorEmail;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EmailConstructorRecipients extends Component
{
    public $limit_emails = 5000;

    public $list = '';

    public $list_count = 0;
    
    public $emails = [];

    public $excluded_emails = [];

    public EmailConstructor $emailConstructor;

    public function addClient(): void
    {
        $users = User::select('email')->get();

        $emails = [];

        // Очистим дубли навсякий случай
        foreach (explode("\n", str_replace("\r", "", $this->list)) as $email) {
            if (!empty(trim($email))) {
                $emails[$email] = $email;
            }
        }

        foreach ($users as $user) {
            $emails[$user->email] = $user->email;
        }

        $this->list_count = count($emails);
        $this->list = $emails ? implode("\n", $emails) : '';
    }

    public function addSubscriber(): void
    {
        $subscriptions = Subscription::select('email')->get();

        $emails = [];

        // Очистим дубли навсякий случай
        foreach (explode("\n", str_replace("\r", "", $this->list)) as $email) {
            if (!empty(trim($email))) {
                $emails[$email] = $email;
            }
        }

        foreach ($subscriptions as $subscription) {
            $emails[$subscription->email] = $subscription->email;
        }

        $this->list_count = count($emails);
        $this->list = $emails ? implode("\n", $emails) : '';
    }

    public function updateList(): void
    {
        $list_new = [];

        $emails = [];

        // Очистим дубли навсякий случай
        foreach (explode("\n", str_replace("\r", "", $this->list)) as $email) {
            if (!empty(trim($email))) {
                $emails[$email] = $email;
            }
        }

        foreach ($emails as $email) {
            if ((count($this->emails) < $this->limit_emails) || isset($this->emails[$email])) {
                $validator = Validator::make(['email' => $email], [
                    'email' => 'required|email',
                ]);
        
                if (!$validator->fails()) {
                    $type = 'client';
                    $status = true;

                    $model = User::where('email', $email)->first();

                    if (!$model) {
                        $model = Subscription::where('email', $email)->first();
                        $type = 'subscriber';

                        if ($model && !$model->status) {
                            $status = false;
                        }
                    }

                    if ($status) {
                        if ($model) {
                            
                        } else {
                            $type = 'custom';
                        }

                        $this->emails[$email] = [
                            'type' => $type,
                            'model' => $model,
                        ];

                        if (isset($this->excluded_emails[$email])) {
                            unset($this->excluded_emails[$email]);
                        }

                    } else {
                        $this->excluded_emails[$email] = __('The user has unsubscribed from the mailing list');
                    }
                } elseif (!empty($email)) { 
                    $this->excluded_emails[$email] = implode(', ', $validator->errors()->all());
                }
            } else {
                $list_new[$email] = $email;
            }
        }

        $this->list_count = count($list_new);
        $this->list = $list_new ? implode("\n", $list_new) : '';
    }

    public function deleteEmail(string $email):void
    {
        if (isset($this->emails[$email])) {
            unset($this->emails[$email]);
        }
    }

    public function viewHtmlEmail(string $email): void
    {
        $this->emailConstructor->html = (new ConstructorEmail($this->emails[$email]['type'] == 'client' ? $this->emails[$email]['model'] : $email, $this->emailConstructor))->render();
    }

    public function send(): void
    {
        foreach($this->emails as $email => $data) {
            ConstructorEmailJob::dispatch($this->emails[$email]['type'] == 'client' ? $this->emails[$email]['model'] : $email, $this->emailConstructor);

            unset($this->emails[$email]);
        }
    }

    public function render()
    {
        $this->updateList();

        return view('admin.email-constructor-recipients');
    }
}
