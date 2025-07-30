<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIncomeRequest extends FormRequest
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
            'account_id' => 'required|exists:accounts,id',
            'income_source_id' => 'required|exists:income_sources,id',
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'income_date' => 'required|date',
            'details' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'account_id.required' => 'Please select an account.',
            'account_id.exists' => 'Selected account does not exist.',

            'income_source_id.required' => 'Please select an income source.',
            'income_source_id.exists' => 'Selected income source does not exist.',

            'title.required' => 'Income title is required.',
            'title.string' => 'Title must be a valid string.',
            'title.max' => 'Title may not exceed 255 characters.',

            'amount.required' => 'Amount is required.',
            'amount.numeric' => 'Amount must be a number.',
            'amount.min' => 'Amount must be at least 0.',

            'income_date.required' => 'Income date is required.',
            'income_date.date' => 'Please enter a valid date.',

            'details.string' => 'Details must be a valid string.',
            'details.max' => 'Details may not exceed 1000 characters.',
        ];
    }
}
