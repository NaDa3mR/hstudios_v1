<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceReqRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'client_id' => 'required|exists:clients,id',
            'service_id' => 'required|exists:services,id',
            'status' => 'required|string|in:pending,approved,rejected',
            'details' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name must not exceed 255 characters.',

            'client_id.required' => 'The client is required.',
            'client_id.exists' => 'The selected client does not exist.',

            'service_id.required' => 'The service is required.',
            'service_id.exists' => 'The selected service does not exist.',

            'status.required' => 'The status is required.',
            'status.string' => 'The status must be a string.',
            'status.in' => 'The status must be one of: pending, approved, rejected.',

            'details.string' => 'The details must be a valid string.',
        ];
    }
}
