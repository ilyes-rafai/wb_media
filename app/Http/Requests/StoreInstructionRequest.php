<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstructionRequest extends FormRequest
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
            'title_en' => ['required', 'string', 'max:255'], // Title is required and must not exceed 255 characters
            'title_ar' => ['required', 'string', 'max:255'],
            'title_fr' => ['required', 'string', 'max:255'],
            'description_en' => ['nullable', 'string'],      // Description is optional but must be a string
            'description_ar' => ['nullable', 'string'],      
            'description_fr' => ['nullable', 'string'],      
            'code' => ['nullable', 'string'],            // Code is optional but must be a string
            'premium' => ['boolean'],                    // Premium must be a boolean value (true/false)
            'trick_id' => ['required', 'exists:tricks,id'], // Trick ID is required and must exist in the tricks table
        ];
    }
}
