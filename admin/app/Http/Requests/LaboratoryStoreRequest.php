<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaboratoryStoreRequest extends FormRequest
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
            'name'  => 'required|max:200',
            'email' => 'email',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Este campo deve ser preenchido.',
            'name.max'          => 'Este campo deve ter no máximo 200 caracteres',
            'email.required'    => 'Este campo deve ser preenchido.',
            'email.email'       => 'Preencha o email corretamente',
            'email.unique'      => 'Este email já está cadastrado.',
        ];
    }
}
