<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EstimateItemsRequest extends FormRequest
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
            'estimate_id' => 'required|integer|exists:estimates,id',
            'material_id' => 'required|integer|exists:materials,id',
            'quantity' => 'required|numeric|min:0',
            'rate' => 'required|numeric|min:0',
        ];
    }
}
