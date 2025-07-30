<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
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
            'balance' => 'nullable|numeric|min:0',
            //'is_active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The account name is required.',
            'name.string' => 'The account name must be a valid string.',
            'name.max' => 'The account name must not be more than 255 characters.',
            'balance.numeric' => 'The balance must be a number.',
            'balance.min' => 'The balance cannot be negative.',
        ];
    }

}
