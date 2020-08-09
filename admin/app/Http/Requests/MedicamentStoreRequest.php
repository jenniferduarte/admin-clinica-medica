<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicamentStoreRequest extends FormRequest
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
            'generic_name' => 'required',
            'factory_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'generic_name.required' => 'Este campo deve ser preenchido.',
            'factory_name.required' => 'Este campo deve ser preenchido.',
        ];
    }
}
