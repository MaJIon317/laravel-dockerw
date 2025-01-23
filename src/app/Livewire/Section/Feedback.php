<?php

namespace App\Livewire\Section;

use Livewire\Attributes\Validate;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Feedback as FeedbackModel;

class Feedback extends Component
{
    public string $success;

    #[Validate('required|min:3|max:200')]
    public string $code;

    #[Validate('required')]
    public string $senturl;

    #[Validate('required|min:3|max:200')]
    public string $name = '';

    #[Validate('sometimes|nullable|min:3|email:rfc,dns')]
    public string $email = '';

    #[Validate('sometimes|nullable|numeric|min:9')]
    public string $phone = '';

    #[Validate('sometimes|nullable|min:3|max:200')]
    public string $comment = '';
 
    public function save(Request $request)
    {
        $this->withValidator(function ($validator) {
            $validator->after(function ($validator) {
                if (empty(trim($this->email)) && empty(trim($this->phone))) {
                    $validator->errors()->add('phone', __('feedback.required'));
                    $validator->errors()->add('email', __('feedback.required'));
                }
            });
        });

        $this->validate();

        FeedbackModel::create([
            'user_id' => auth('web')->id() ?? 0,
            'code' => $this->code ?? '',
            'name' => $this->name ?? '',
            'email' => $this->email ?? '',
            'phone' => $this->phone ?? '',
            'comment' => $this->comment ?? '',
            'senturl' => $this->senturl ?? '',
        ]); 

        $this->reset(['name', 'email', 'phone', 'comment']);

        $this->dispatch('toast', message: $this->success ?? __('feedback.message'));
    }

    public function render()
    {
        if(view()->exists('components.section.feedback.' . $this->code)) {
            return view('components.section.feedback.' . $this->code);
        } return '<div></div>';
    }
}
