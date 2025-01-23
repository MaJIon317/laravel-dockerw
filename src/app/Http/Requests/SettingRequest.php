<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'name' => 'required|min:10',
            'description' => 'required|min:100',
            'image' => 'required',
            'address' => 'required|min:10',
            'geocode' => 'required',
            'mode' => 'required',
            'phone' => 'required',
            'phone_federal' => 'required',
            'email' => 'required|email',
            'email_send' => 'required|email',
            'page_limits' => 'required',
            'page_limit' => 'required',
            'yandex_token' => 'required',
            'yandex_review' => 'required',
            'dadata.key' => 'required',
            'dadata.secret' => 'required',
            'order_free' => 'required',
            'order_min' => 'required',
        ];
    }
}
