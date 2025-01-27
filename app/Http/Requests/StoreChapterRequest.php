<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChapterRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'premium' => ['boolean'],
            'episode' => 'required|file|mimes:mp4,webm,ogg,avi,mpeg,quicktime,mkv|max:10240',
            'cover' => 'required|file|mimes:png,jpg,jpeg|max:10240',
            'course_id' => ['required', 'exists:courses,id'],
        ];
    }
}
