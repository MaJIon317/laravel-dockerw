<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'phone' => 'required|min:9|unique:users,phone,' . $this->user->id,
            'name' => 'required|min:6',
            'city' => 'sometimes|nullable|min:3',
            'password' => 'sometimes|nullable|min:8',
        ];
    }
}