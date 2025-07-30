<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            // 'deal_id' => 'required|exists:deals,id',
            // 'client_id' => 'required|exists:clients,id',
            'amount' => 'required|numeric|min:0',
            'pay_date' => 'required|date',
            'details' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            // 'deal_id.required' => 'The deal is required.',
            // 'deal_id.exists' => 'The selected deal does not exist.',

            // 'client_id.required' => 'The client is required.',
            // 'client_id.exists' => 'The selected client does not exist.',

            'amount.required' => 'The payment amount is required.',
            'amount.numeric' => 'The amount must be a number.',
            'amount.min' => 'The amount must be at least 0.',

            'pay_date.required' => 'The payment date is required.',
            'pay_date.date' => 'The payment date must be a valid date.',

            'details.string' => 'Details must be a valid string.',
        ];
    }
}
