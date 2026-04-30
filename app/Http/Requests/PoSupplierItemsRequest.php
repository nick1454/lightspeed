<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PoSupplierItemsRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'item_id' => 'nullable|integer',
            'po_supplier_id' => 'required|integer',
            'material_id' => 'required|integer',
            'material_name' => 'required|string',
            'rate' => 'required|numeric',
            'quantity' => 'required|numeric',
            'remarks' => 'nullable|string',
        ];
    }
}
