<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
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
            'client_id' => 'required|exists:clients,id',
            'deal_id' => 'nullable|exists:deals,id',
            // 'invoice_number' => 'required|string|unique:invoices,invoice_number',
            'amount' => 'required|numeric|min:0',
            'invoice_date' => 'required|date',
            'status' => 'required|in:unpaid,pending,paid',
            'details' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'client_id.required' => 'The client is required.',
            'client_id.exists' => 'The selected client does not exist.',

            'deal_id.exists' => 'The selected deal does not exist.',

            // 'invoice_number.required' => 'The invoice number is required.',
            // 'invoice_number.string' => 'The invoice number must be a valid text.',
            // 'invoice_number.unique' => 'This invoice number is already taken.',

            'amount.required' => 'The amount is required.',
            'amount.numeric' => 'The amount must be a number.',
            'amount.min' => 'The amount must be at least 0.',

            'invoice_date.required' => 'The invoice date is required.',
            'invoice_date.date' => 'The invoice date must be a valid date.',

            'status.required' => 'The invoice status is required.',
            'status.in' => 'The status must be one of: unpaid, pending, paid.',

            'details.string' => 'The details must be text.',
        ];
    }
}
