<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'], // Title is required, must be a string, and has a max length of 255 characters
            'premium' => ['boolean'], // Title is required, must be a string, and has a max length of 255 characters
            'topics' => 'required|array',
            'topics.*' => 'integer|exists:topics,id',
        ];
    }
}
