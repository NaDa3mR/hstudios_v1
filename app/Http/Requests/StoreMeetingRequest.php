<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMeetingRequest extends FormRequest
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
            // 'client_id' => 'required|exists:clients,id',
            'subject' => 'required|string|max:255',
            'type' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'meet_date' => 'required|date|after_or_equal:today',
            'details' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            // 'client_id.required' => 'The client field is required.',
            // 'client_id.exists' => 'The selected client does not exist.',

            'subject.required' => 'Meeting subject is required.',
            'subject.string' => 'Subject must be a valid string.',
            'subject.max' => 'Subject may not exceed 255 characters.',

            'type.string' => 'Meeting type must be a valid string.',
            'type.max' => 'Type may not exceed 100 characters.',

            'address.string' => 'Address must be a valid string.',
            'address.max' => 'Address may not exceed 255 characters.',

            'meet_date.required' => 'Meeting date is required.',
            'meet_date.date' => 'Please enter a valid date.',
            'meet_date.after_or_equal' => 'Meeting date cannot be in the past.',

            'details.string' => 'Details must be a valid string.',
        ];
    }
}
