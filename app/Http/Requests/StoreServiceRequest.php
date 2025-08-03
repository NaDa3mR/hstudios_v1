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
            'title' => 'required|string|max:255',
            'meta_keyword' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'details' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name must not exceed 255 characters.',

            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a valid string.',
            'title.max' => 'The title must not exceed 255 characters.',

            'meta_keyword.required' => 'The meta keyword field is required.',
            'meta_keyword.string' => 'The meta keyword must be a valid string.',
            'meta_keyword.max' => 'The meta keyword must not exceed 255 characters.',

            'meta_description.required' => 'The meta description field is required.',
            'meta_description.string' => 'The meta description must be a valid string.',
            'meta_description.max' => 'The meta description must not exceed 255 characters.',

            'meta_title.required' => 'The meta title field is required.',
            'meta_title.string' => 'The meta title must be a valid string.',
            'meta_title.max' => 'The meta title must not exceed 255 characters.',

            'details.required' => 'The details field is required.',
            'details.string' => 'The details must be a valid string.',
        ];
    }
}
