<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInterviewRequest extends FormRequest
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
            // 'job_application_id' => 'required|exists:job_applications,id',
            'type' => 'required|string|max:255',
            'interview_date' => 'required|date|after_or_equal:today',
            'duration' => 'nullable|integer|min:1',
            'details' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            // 'job_application_id.required' => 'The job application is required.',
            // 'job_application_id.exists' => 'The selected job application does not exist.',

            'type.required' => 'The interview type is required.',
            'type.string' => 'The type must be a valid string.',
            'type.max' => 'The type may not exceed 255 characters.',

            'interview_date.required' => 'The interview date is required.',
            'interview_date.date' => 'The interview date must be a valid date.',
            'interview_date.after_or_equal' => 'The interview date cannot be in the past.',

            'duration.integer' => 'Duration must be a number in minutes.',
            'duration.min' => 'Duration must be at least 1 minute.',

            'details.string' => 'Details must be a valid string.',
            'details.max' => 'Details may not exceed 1000 characters.',
        ];
    }
}
