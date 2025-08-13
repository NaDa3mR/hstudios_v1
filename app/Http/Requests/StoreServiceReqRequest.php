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
        // 'service_id' => 'required|exists:services,id',
        'services' => 'required|array',
        'services.*' => 'exists:services,id',
        'details' => 'required|string',
        'request_file' => 'required|mimes:pdf,doc,docx|max:2048',
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

        'services.required' => 'Please select at least one service.',
        'services.array' => 'The services must be an array.',
        'services.*.exists' => 'One or more selected services do not exist.',

        'status.required' => 'The status is required.',
        'status.string' => 'The status must be a string.',
        'status.in' => 'The status must be one of: pending, approved, rejected.',

        'details.string' => 'The details must be a valid string.',

        'request_file.required' => 'Please upload your File.',
        'request_file.mimes' => 'The File must be a file of type: PDF, DOC, or DOCX.',
        'request_file.max' => 'The File may not be greater than 2MB.',
    ];
}

}
