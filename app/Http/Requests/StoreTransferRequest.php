<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransferRequest extends FormRequest
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
            'amount' => 'required|numeric|min:0.01',
            'transfer_date' => 'required|date',
            'details' => 'nullable|string',
            'account_id_from' => 'required|exists:accounts,id|different:account_id_to',
            'account_id_to' => 'required|exists:accounts,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title is required.',
            'title.string' => 'Title must be a valid string.',
            'title.max' => 'Title must not exceed 255 characters.',

            'amount.required' => 'Amount is required.',
            'amount.numeric' => 'Amount must be a valid number.',
            'amount.min' => 'Amount must be greater than 0.',

            'transfer_date.required' => 'Transfer date is required.',
            'transfer_date.date' => 'Transfer date must be a valid date.',

            'details.string' => 'Details must be a valid string.',

            'account_id_from.required' => 'Source account is required.',
            'account_id_from.exists' => 'Selected source account does not exist.',
            'account_id_from.different' => 'Source and destination accounts must be different.',

            'account_id_to.required' => 'Destination account is required.',
            'account_id_to.exists' => 'Selected destination account does not exist.',
        ];
    }
}
