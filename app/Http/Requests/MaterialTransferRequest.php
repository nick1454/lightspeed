<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MaterialTransferRequest extends FormRequest
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
            'warehouse_from_id' => 'required|integer|exists:warehouses,id',
            'warehouse_to_id' => 'required|integer|exists:warehouses,id',
            'remarks' => 'nullable|string|max:255',
        ];
    }
}
