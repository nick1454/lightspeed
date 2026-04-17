<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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
            'name' => $this->route('id') ? 'required|unique:units,name,' . $this->route('id') : 'required|unique:units,name',
            'short_name' => $this->route('id') ? 'required|unique:units,short_name,' . $this->route('id') : 'required|unique:units,short_name',
        ];
    }
}
