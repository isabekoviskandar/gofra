<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceCreateRequest extends FormRequest
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
            'company_name' => 'required|string|max:255',
            'date' => 'required|date',
            'text' => 'required|string',
            'row_material_id' => 'required|array',
            'row_material_id.*' => 'required|exists:row_materials,id',
            'unit' => 'required|array',
            'unit.*' => 'required|string|max:255',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
            'price' => 'required|array',
            'price.*' => 'required|numeric|min:0',
            'summ' => 'required|array',
            'summ.*' => 'required|numeric|min:0'
        ];
    }
}
