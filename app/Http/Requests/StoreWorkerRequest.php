<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'section_id' => 'required|exists:sections,id',
            'user_id' => 'required|exists:users,id',
            'salary' => 'required|numeric|min:0',
            'salary_type' => 'required|string|in:workly,hourly',
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'The phone number is required.',
            'phone.string' => 'The phone number must be a valid string.',
            'phone.max' => 'The phone number cannot exceed 15 characters.',
            'address.required' => 'The address is required.',
            'address.string' => 'The address must be a valid string.',
            'address.max' => 'The address cannot exceed 255 characters.',
            'section_id.required' => 'The section selection is required.',
            'section_id.exists' => 'The selected section does not exist.',
            'user_id.required' => 'The user selection is required.',
            'user_id.exists' => 'The selected user does not exist.',
            'salary.required' => 'The salary amount is required.',
            'salary.numeric' => 'The salary must be a valid number.',
            'salary.min' => 'The salary must be at least 0.',
            'salary_type.required' => 'The salary type is required.',
            'salary_type.string' => 'The salary type must be a valid string.',
            'salary_type.in' => 'The salary type must be either workly or hourly.',
        ];
    }
}
