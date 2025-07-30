<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobApplicationRequest extends FormRequest
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
            // 'career_id' => 'required|exists:careers,id',
            // 'candidate_id' => 'required|exists:candidates,id',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'linkedin' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'behance' => 'nullable|url|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            // 'career_id.required' => 'The career field is required.',
            // 'career_id.exists' => 'The selected career does not exist.',

            // 'candidate_id.required' => 'The candidate field is required.',
            // 'candidate_id.exists' => 'The selected candidate does not exist.',

            'first_name.required' => 'First name is required.',
            'first_name.string' => 'First name must be a valid string.',
            'first_name.max' => 'First name may not exceed 100 characters.',

            'last_name.required' => 'Last name is required.',
            'last_name.string' => 'Last name must be a valid string.',
            'last_name.max' => 'Last name may not exceed 100 characters.',

            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email may not exceed 255 characters.',

            'phone.max' => 'Phone number may not exceed 20 characters.',

            'country.max' => 'Country may not exceed 100 characters.',
            'city.max' => 'City may not exceed 100 characters.',

            'linkedin.url' => 'LinkedIn must be a valid URL.',
            'github.url' => 'GitHub must be a valid URL.',
            'behance.url' => 'Behance must be a valid URL.',
        ];
    }
}
