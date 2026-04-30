<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MaterialInwardItemsRequest extends FormRequest
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
            'material_inward_id' => 'required|integer|exists:material_inwards,id',
            'material_id' => 'required|integer|exists:materials,id',
            'material_name' => 'required|string|max:255',
            'rate' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:1',
            // 'po_id' => 'required|integer|exists:po_suppliers,id',
        ];
    }
}
