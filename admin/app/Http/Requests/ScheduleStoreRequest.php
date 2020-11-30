<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleStoreRequest extends FormRequest
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
            'date' => 'required',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time'
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'Este campo deve ser preenchido',
            'start_time.required' => 'Este campo deve ser preenchido.',
            'end_time.required' => 'Este campo deve ser preenchido.',
            'end_time.after' => 'Deve ser um valor posterior a hora inicial.',
        ];
    }
}
