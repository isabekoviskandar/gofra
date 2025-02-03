<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:sections,name',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The section name is required.',
            'name.string' => 'The section name must be a string.',
            'name.max' => 'The section name may not be greater than 255 characters.',
            'name.unique' => 'A section with this name already exists.',
        ];
    }
}
