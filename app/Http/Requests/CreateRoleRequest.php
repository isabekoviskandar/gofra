<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'permissions' => 'required|array',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The role name is required.',
            'name.max' => 'The role name should not exceed 255 characters.',
            'permissions.required' => 'Permissions are required.',
            'permissions.array' => 'Permissions must be an array.',
        ];
    }
}
