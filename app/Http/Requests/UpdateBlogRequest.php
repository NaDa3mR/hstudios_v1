<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            //'slug' => 'required|string|max:255|unique:pages,slug',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_title' => 'nullable|string|max:255',
            'details' => 'required|string',
            //'is_active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title is required.',
            'title.string' => 'The title must be a valid string.',
            'title.max' => 'The title may not exceed 255 characters.',

            'sub_title.string' => 'The sub-title must be a string.',
            'sub_title.max' => 'The sub-title may not exceed 255 characters.',

            'meta_keyword.string' => 'The meta keywords must be a string.',
            'meta_keyword.max' => 'Meta keywords may not exceed 255 characters.',

            'meta_description.string' => 'The meta description must be a string.',
            'meta_description.max' => 'Meta description may not exceed 500 characters.',

            'meta_title.string' => 'The meta title must be a string.',
            'meta_title.max' => 'Meta title may not exceed 255 characters.',

            'details.required' => 'Details are required.',
            'details.string' => 'Details must be valid text.',
        ];
    }
}
