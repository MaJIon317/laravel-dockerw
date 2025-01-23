<?php

namespace App\Livewire;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class Unsubscribe extends Component
{
    public string $message = '';

    public function render(Request $request)
    {
        $data = email_constructor_decrypt($request->get('messageId'));

        $email = $data['email'] ?? null;
   
        $subscriber = Subscription::where('email', $email)->first();

        if ($subscriber) {
            $this->message = __('You have been successfully removed from the mailing list');

            $subscriber->status = 0;
            $subscriber->save();
        } elseif ($user = User::where('email', $email)->first()) {
            $this->redirectRoute('dashboard.setting');
        } else {
            $this->message = __('Your E-mail is not on the mailing list');
        }

        return view('unsubscribe')->layoutData([
            'title'             => config('settings.meta.unsubscribe.h1'),
            'meta_title'        => config('settings.meta.unsubscribe.title'),
            'meta_description'  => config('settings.meta.unsubscribe.description'),
            'meta_keywords'     => config('settings.meta.unsubscribe.keyword'),
            'breadcrumbs'       => [config('settings.meta.unsubscribe.h1')]
        ]);
    }
}
