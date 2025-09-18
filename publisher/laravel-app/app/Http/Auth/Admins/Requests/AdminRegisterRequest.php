<?php

namespace App\Http\Auth\Admins\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
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
//            'name' => ['required'],
//            'email' => ['required','email','unique:jw_users.customers,email'],
//            'password' => ['required'],
//            'c_password' => ['required','same:password'],
        ];
    }
}
