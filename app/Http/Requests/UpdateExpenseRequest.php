<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseRequest extends FormRequest
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
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable|string|max:20',
            'job' => 'nullable|string|max:100',
            'linkedin' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'behance' => 'nullable|url|max:255',
            'salary' => 'nullable|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Employee name is required.',
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name may not be greater than 255 characters.',

            'email.required' => 'Email is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already in use.',

            'phone.string' => 'Phone must be a valid string.',
            'phone.max' => 'Phone may not be greater than 20 characters.',

            'job.string' => 'Job title must be a valid string.',
            'job.max' => 'Job title may not exceed 100 characters.',

            'linkedin.url' => 'LinkedIn must be a valid URL.',
            'github.url' => 'GitHub must be a valid URL.',
            'behance.url' => 'Behance must be a valid URL.',

            'salary.numeric' => 'Salary must be a numeric value.',
            'salary.min' => 'Salary must be at least 0.',
        ];
    }
}
