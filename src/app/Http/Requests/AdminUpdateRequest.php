<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
            'email' => 'required|email|unique:admins,email,' . $this->admin->id,
            'name' => 'required|min:10',
            'password' => 'sometimes|nullable|min:8',
        ];
    }
}
