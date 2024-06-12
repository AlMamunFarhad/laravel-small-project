<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|min:2|regex:/^[\pL\s\-_$]+$/u',
            'email' => 'required|email:rfc,dns',
            'password' => ['required','confirmed', Password::defaults()]
        ];

    }
}
//Password::min(3)->mixedCase()->symbols()->numbers()->uncompromised()
