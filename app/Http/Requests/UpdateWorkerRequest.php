<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone' => 'sometimes|string|max:15',
            'address' => 'sometimes|string|max:255',
            'section_id' => 'sometimes|exists:sections,id',
            'user_id' => 'sometimes|exists:users,id',
            'salary' => 'sometimes|numeric|min:0',
            'salary_type' => 'sometimes|string|in:workly,hourly',
        ];
    }

    public function messages()
    {
        return [
            'phone.string' => 'The phone number must be a valid string.',
            'phone.max' => 'The phone number cannot exceed 15 characters.',
            'address.string' => 'The address must be a valid string.',
            'address.max' => 'The address cannot exceed 255 characters.',
            'section_id.exists' => 'The selected section does not exist.',
            'user_id.exists' => 'The selected user does not exist.',
            'salary.numeric' => 'The salary must be a valid number.',
            'salary.min' => 'The salary must be at least 0.',
            'salary_type.string' => 'The salary type must be a valid string.',
            'salary_type.in' => 'The salary type must be either workly or hourly.',
        ];
    }
}
