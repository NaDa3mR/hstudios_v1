<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDealRequest extends FormRequest
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
            'status' => 'required|string|max:100',
            'details' => 'nullable|string|max:1000',
            'name' => 'required|string|max:255',
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'Status is required.',
            'status.string' => 'Status must be a valid string.',
            'status.max' => 'Status may not exceed 100 characters.',

            'details.string' => 'Details must be text.',
            'details.max' => 'Details may not exceed 1000 characters.',

            'services.required' => 'At least one service must be selected.',
            'services.*.exists' => 'Selected service is invalid.',
        ];
    }
}
