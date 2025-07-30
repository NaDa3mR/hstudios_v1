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
            'service_request_id' => 'required|exists:service_requests,id',
            'status' => 'required|string|max:100',
            'details' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'service_request_id.required' => 'A service request must be selected.',
            'service_request_id.exists' => 'The selected service request does not exist.',

            'status.required' => 'Status is required.',
            'status.string' => 'Status must be a valid string.',
            'status.max' => 'Status may not exceed 100 characters.',

            'details.string' => 'Details must be text.',
            'details.max' => 'Details may not exceed 1000 characters.',
        ];
    }
}
