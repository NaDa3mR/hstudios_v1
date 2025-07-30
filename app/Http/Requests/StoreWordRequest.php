<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWordRequest extends FormRequest
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
            'param' => 'required|string|max:255',
            'ar' => 'required|string|max:255',
            'fr' => 'nullable|string|max:255',
            'en' => 'nullable|string|max:255',
            'wordable_type' => 'required|string|max:255',
            'wordable_id' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'param.required' => 'Parameter (param) is required.',
            'param.string' => 'Parameter must be a valid string.',
            'param.max' => 'Parameter must not exceed 255 characters.',

            'ar.required' => 'Arabic translation is required.',
            'ar.string' => 'Arabic translation must be a valid string.',
            'ar.max' => 'Arabic translation must not exceed 255 characters.',

            'fr.string' => 'French translation must be a valid string.',
            'fr.max' => 'French translation must not exceed 255 characters.',

            'en.string' => 'English translation must be a valid string.',
            'en.max' => 'English translation must not exceed 255 characters.',

            'wordable_type.required' => 'Wordable type is required.',
            'wordable_type.string' => 'Wordable type must be a valid string.',
            'wordable_type.max' => 'Wordable type must not exceed 255 characters.',

            'wordable_id.required' => 'Wordable ID is required.',
            'wordable_id.integer' => 'Wordable ID must be an integer.',
        ];
    }
}
