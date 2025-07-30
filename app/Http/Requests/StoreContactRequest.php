<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be a valid string.',
            'name.max' => 'Name may not exceed 255 characters.',

            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email may not exceed 255 characters.',

            'phone.string' => 'Phone number must be a string.',
            'phone.max' => 'Phone number may not exceed 20 characters.',

            'subject.required' => 'Subject is required.',
            'subject.string' => 'Subject must be a string.',
            'subject.max' => 'Subject may not exceed 255 characters.',

            'message.required' => 'Message content is required.',
            'message.string' => 'Message must be text.',
            'message.min' => 'Message must be at least 10 characters.',
            'message.max' => 'Message may not exceed 1000 characters.',
        ];
    }
}
