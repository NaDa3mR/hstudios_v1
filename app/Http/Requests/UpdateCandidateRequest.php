<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCandidateRequest extends FormRequest
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
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:candidates,email,' . $this->candidate->id,
            'phone' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'linkedin' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'behance' => 'nullable|url|max:255',
            //'is_hired' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.string' => 'First name must be a string.',
            'first_name.max' => 'First name may not exceed 100 characters.',

            'last_name.required' => 'Last name is required.',
            'last_name.string' => 'Last name must be a string.',
            'last_name.max' => 'Last name may not exceed 100 characters.',

            'email.required' => 'Email is required.',
            'email.email' => 'Email must be valid.',
            'email.unique' => 'This email is already taken.',

            'phone.string' => 'Phone must be a string.',
            'phone.max' => 'Phone number may not exceed 20 characters.',

            'country.string' => 'Country must be a string.',
            'country.max' => 'Country may not exceed 100 characters.',

            'city.string' => 'City must be a string.',
            'city.max' => 'City may not exceed 100 characters.',

            'linkedin.url' => 'LinkedIn must be a valid URL.',
            'github.url' => 'GitHub must be a valid URL.',
            'behance.url' => 'Behance must be a valid URL.',

            'linkedin.max' => 'LinkedIn URL must not exceed 255 characters.',
            'github.max' => 'GitHub URL must not exceed 255 characters.',
            'behance.max' => 'Behance URL must not exceed 255 characters.',
        ];
    }
}
