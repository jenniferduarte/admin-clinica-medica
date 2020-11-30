<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientStoreRequest extends FormRequest
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
            'name'          => 'required',
            'email'         => 'required|email|unique:users',
            'mother_name'   => 'required',

            // Address Rules
            'street'        => 'required',
            'number'        => 'required',
            'district'      => 'required',
            'city'          => 'required',
            'state'         => 'required',
            'country'       => 'required',
            'cep'           => 'required',
            // End Address Rules
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Este campo deve ser preenchido.',
            'email.required'        => 'Este campo deve ser preenchido.',
            'email.email'           => 'Favor preencha corretamente.',
            'email.unique'          => 'Email já cadastrado.',
            'mother_name.required'  => 'Este campo deve ser preenchido.',

            // Address Rules
            'street.required'       => 'Este campo deve ser preenchido.',
            'number.required'       => 'Este campo deve ser preenchido.',
            'district.required'     => 'Este campo deve ser preenchido.',
            'city.required'         => 'Este campo deve ser preenchido.',
            'state.required'        => 'Este campo deve ser preenchido.',
            'country.required'      => 'Este campo deve ser preenchido.',
            'cep.required'          => 'Este campo deve ser preenchido.',
            // End Address Rules
        ];
    }
}
