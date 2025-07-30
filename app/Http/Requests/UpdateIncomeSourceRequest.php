<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIncomeSourceRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:income_sources,name',
            'details' => 'nullable|string|max:1000',
            'is_active' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The income source name is required.',
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'name.unique' => 'This income source name already exists.',

            'details.string' => 'Details must be a valid string.',
            'details.max' => 'Details may not exceed 1000 characters.',

            'is_active.required' => 'Please specify if the income source is active.',
            'is_active.boolean' => 'The active status must be true or false.',
        ];
    }
}
