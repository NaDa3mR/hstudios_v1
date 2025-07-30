<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'name.string' => 'Name must be a string.',
            'name.max' => 'Name can\'t exceed 255 characters.',

            'email.required' => 'Email is required.',
            'email.email' => 'Enter a valid email address.',
            'email.unique' => 'This email is already taken.',

            'phone.string' => 'Phone number must be a string.',
            'phone.max' => 'Phone number can\'t exceed 20 characters.',

            'job.string' => 'Job title must be a string.',
            'job.max' => 'Job title can\'t exceed 100 characters.',

            'linkedin.url' => 'LinkedIn link must be a valid URL.',
            'github.url' => 'GitHub link must be a valid URL.',
            'behance.url' => 'Behance link must be a valid URL.',

            'salary.numeric' => 'Salary must be a number.',
            'salary.min' => 'Salary can\'t be negative.',
        ];
    }
}
