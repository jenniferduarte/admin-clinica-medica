<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResultStoreRequest extends FormRequest
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
            'doctor_id'     => 'required',
            'patient_id'    => 'required',
            'laboratory_id' => 'required',
            'file'          => 'required|mimes:pdf|file|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'doctor_id.required'        => 'Este campo deve ser preenchido.',
            'patient_id.required'       => 'Este campo deve ser preenchido.',
            'laboratory_id.required'    => 'Este campo deve ser preenchido.',
            'file.required'             => 'Este campo deve ser preenchido.',
            'file.mimes'                => 'Formato inválido. Utilize :mimes',
            'file.files'                => 'Preencha o campo corretamente.',
            'file.max'                  => 'O arquivo deve ter no máximo 2MB.'
        ];
    }
}
