<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateRequest extends FormRequest
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
            'admin_role_id' => 'required|exists:admin_roles,id',
            'name' => 'required|min:10',
            'email' => 'required|email|max:250|unique:admins,email',
            'password' => 'required|string|min:8',
        ]; 
    }
}
