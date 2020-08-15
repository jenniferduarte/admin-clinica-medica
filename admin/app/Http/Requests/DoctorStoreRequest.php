<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorStoreRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo deve ser preenchido.',
            'email.required' => 'Este campo deve ser preenchido.',
            'email.email' => 'Favor preencha corretamente.',
            'email.unique' => 'Email já cadastrado.',
            'password.required' => 'Este campo deve ser preenchido.',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres',
            'password.confirmed' => 'As senhas devem ser iguais.',
        ];
    }
}
