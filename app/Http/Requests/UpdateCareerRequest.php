<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCareerRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'currency' => 'required|string|max:10',
            'type' => 'required|string|max:50',
            'experience_level' => 'required|string|max:50',
            'details' => 'required|string|min:10',
            'min_salary' => 'nullable|numeric|min:0',
            'max_salary' => 'nullable|numeric|min:0|gte:min_salary',
            'is_active' => 'nullable|boolean',
            'is_published' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The job title is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not exceed 255 characters.',

            'currency.required' => 'Currency is required.',
            'currency.string' => 'Currency must be a string.',
            'currency.max' => 'Currency may not exceed 10 characters.',

            'type.required' => 'Job type is required.',
            'type.string' => 'Job type must be a string.',
            'type.max' => 'Job type may not exceed 50 characters.',

            'experience_level.required' => 'Experience level is required.',
            'experience_level.string' => 'Experience level must be a string.',
            'experience_level.max' => 'Experience level may not exceed 50 characters.',

            'details.required' => 'Job details are required.',
            'details.string' => 'Details must be a string.',
            'details.min' => 'Details must be at least 10 characters long.',

            'min_salary.numeric' => 'Minimum salary must be a number.',
            'min_salary.min' => 'Minimum salary cannot be negative.',

            'max_salary.numeric' => 'Maximum salary must be a number.',
            'max_salary.min' => 'Maximum salary cannot be negative.',
            'max_salary.gte' => 'Maximum salary must be greater than or equal to the minimum salary.',
        ];
    }
}
