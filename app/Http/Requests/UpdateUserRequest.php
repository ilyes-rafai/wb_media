<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('user')->id;

        return [
            'fullname' => 'required|string|max:255',
            'username' => "required|string|max:255|unique:users,username,{$userId}",
            'email' => "required|email|max:255|unique:users,email,{$userId}",
            'gender' => 'required|boolean',
            'roles' => 'required|array',
            'roles.*' => 'integer|exists:roles,id',
        ];
    }
}
