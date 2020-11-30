<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function validationErrorMessages()
    {
        return [

            'confirmed' => 'A confirmação da senha não confere.',

            'gt' => [
                'numeric' => 'The :attribute must be greater than :value.',
                'file' => 'The :attribute must be greater than :value kilobytes.',
                'string' => 'The :attribute must be greater than :value characters.',
                'array' => 'The :attribute must have more than :value items.',
            ],
            'gte' => [
                'numeric' => 'The :attribute must be greater than or equal :value.',
                'file' => 'The :attribute must be greater than or equal :value kilobytes.',
                'string' => 'The :attribute must be greater than or equal :value characters.',
                'array' => 'The :attribute must have :value items or more.',
            ],

            'min' => [
                'numeric' => 'A :attribute deve ter no mínimo :min.',
                'file' => 'The :attribute must be at least :min kilobytes.',
                'string' => 'A :attribute deve ter no mínimo :min caracteres.',
                'array' => 'The :attribute must have at least :min items.',
            ],

            'password' => 'The password is incorrect.',

            'required' => 'The :attribute field is required.',

            'size' => [
                'numeric' => 'The :attribute must be :size.',
                'file' => 'The :attribute must be :size kilobytes.',
                'string' => 'The :attribute must be :size characters.',
                'array' => 'The :attribute must contain :size items.',
            ],
        ];
    }

}
