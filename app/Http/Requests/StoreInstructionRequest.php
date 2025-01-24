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
            'title' => ['required', 'string', 'max:255'], // Title is required and must not exceed 255 characters
            'description' => ['nullable', 'string'],      // Description is optional but must be a string
            'code' => ['nullable', 'string'],            // Code is optional but must be a string
            'premium' => ['boolean'],                    // Premium must be a boolean value (true/false)
            'project_id' => ['required', 'exists:projects,id'], // Project ID is required and must exist in the projects table
        ];
    }
}
