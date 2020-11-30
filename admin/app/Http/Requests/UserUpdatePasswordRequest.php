<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\VerifyPassword;

class UserUpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|min:8|confirmed',
            'current_password' => ['required', New VerifyPassword]
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Este campo deve ser preenchido.',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres',
            'password.confirmed' => 'As senhas devem ser iguais.',
            'current_password.required' => 'Este campo deve ser preenchido.'
        ];
    }
}
