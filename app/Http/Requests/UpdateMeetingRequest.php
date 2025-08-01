<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMeetingRequest extends FormRequest
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
            // 'client_id' => 'required|exists:clients,id',
            'subject' => 'required|string|max:255',
            'type' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'meet_date' => 'required|date|after_or_equal:today',
            'details' => 'nullable|string',
        ];
    }

    public function messages(){

        return (new StoreMeetingRequest())->messages();
    }
}
