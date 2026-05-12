<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EstimateRequest extends FormRequest
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
            'estimate_date' => 'required|date_format:Y-m-d',
            'estimate_no' => 'required|string|max:255',
            'client_id' => 'required|integer|exists:clients,id',
            'remarks' => 'required|string|max:255',
        ];
    }
}
