<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Role;
use Auth;

class RecordStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->role->id == ROLE::DOCTOR){
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'treatment_plan' => 'required',
            'diagnostic_conclusion' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'treatment_plan.required' => 'Este campo deve ser preenchido',
            'diagnostic_conclusion.required' => 'Este campo deve ser preenchido',
        ];
    }
}
