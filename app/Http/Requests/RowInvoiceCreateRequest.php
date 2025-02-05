<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RowInvoiceCreateRequest extends FormRequest
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
            'invoice_id' => 'required',
            'row_material_id' => 'required',
            'unit' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price'=>'required',
        ];
    }
}
