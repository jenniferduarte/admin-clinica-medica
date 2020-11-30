<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientUpdateRequest extends FormRequest
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
            'mother_name'   => 'required',

            // Address rules
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
            'mother_name.required'  => 'Este campo deve ser preenchido.',

            // Address rules
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
