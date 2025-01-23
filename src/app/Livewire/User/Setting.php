<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Setting extends Component
{
    public $user;

    public $field;

    #[Validate]
    public $password, $password_confirmation;

    public function rules()
    {
        return [
            'field.inn' => 'sometimes|nullable|min:3|max:155',
            'field.name' => 'required|min:3|max:155',
            'field.email' => 'required|email|unique:users,email,' . $this->user->id,
            'field.phone' => 'required|min:9|unique:users,phone,' . $this->user->id,
            'field.city' => 'required|min:3|max:155',
            'field.address' => 'sometimes|nullable|min:3|max:155',
            'password' => 'sometimes|nullable|min:4|confirmed'
        ];
    }

    public function mount()
    {
        $this->user = Auth::user();

        $this->field = array();

        foreach($this->user->getAttributes() as $field_key => $field_value) {
            if (isset($this->rules()['field.' . $field_key])) {
                $this->field[$field_key] = $field_value;
            }
        }
 
    }

    public function save()
    {
        $this->validate();

        if ($this->password) {
            $this->field['password'] = $this->password;
        }
    
        $this->user->update($this->field); 
    
        $this->reset('password', 'password_confirmation');

        $this->dispatch('toast', message: __('user.message_setting'));
    }

    public function render()
    {
        return view('user.setting')->layoutData([
            'title' => __('user.menu_setting')
        ])->layout('layouts.user');
    }
}
 