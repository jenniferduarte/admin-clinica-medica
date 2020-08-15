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
            'name' => 'required',
            'mother_name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo deve ser preenchido.',
            'mother_name.required' => 'Este campo deve ser preenchido.',
        ];
    }
}
