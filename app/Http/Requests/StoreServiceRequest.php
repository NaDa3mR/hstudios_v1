<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            // 'client_id' => 'required|exists:clients,id',
            'service_id' => 'required|exists:services,id',
            'status' => 'required|in:pending,approved,rejected',
            'details' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be a valid string.',
            'name.max' => 'Name must not exceed 255 characters.',

            // 'client_id.required' => 'Client is required.',
            // 'client_id.exists' => 'Selected client does not exist.',

            'service_id.required' => 'Service is required.',
            'service_id.exists' => 'Selected service does not exist.',

            'status.required' => 'Status is required.',
            'status.in' => 'Status must be one of: pending, approved, or rejected.',

            'details.string' => 'Details must be a valid string.',
        ];
    }
}
