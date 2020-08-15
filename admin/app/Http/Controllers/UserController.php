<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Role;
use App\Patient;



class UserController extends Controller
{
    public function store(UserStoreRequest $request)
    {           
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $request->input('role'),
            'cpf' =>  $request->input('cpf'),
            'rg' =>  $request->input('rg'),
            'birth_date' =>  $request->input('birth_date'),
            'phone' =>  $request->input('phone'),
            'gender_id' =>  $request->input('gender'),
            'clinic_id' => 1
        ]);

        $notification = array(
            'message' => 'Criado com sucesso!',
            'alert-type' => 'success'
        );

        // Cria o paciente
        if($request->input('role') == Role::PATIENT ){
            Patient::create([
                'user_id' => $user->id,
                'social_name' => $request->input('social_name'),
                'mother_name' => $request->input('mother_name'),
                'father_name' => $request->input('father_name'),
                'observation' => $request->input('observation'),
                'responsible_name' => $request->input('responsible_name'),
                'responsible_phone' => $request->input('responsible_phone'),
            ]);

            return redirect()->action('PatientController@index')->with($notification);
        };
        
        return redirect()->action('UserController@index')->with($notification);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        User::find($user->id)->update([
            'name' => $request->input('name'),
            'cpf' =>  $request->input('cpf'),
            'rg' =>  $request->input('rg'),
            'birth_date' =>  $request->input('birth_date'),
            'phone' =>  $request->input('phone'),
            'gender_id' =>  $request->input('gender'),
        ]);

        if($user->role->id == Role::PATIENT ){
            Patient::where('user_id', $user->id)->update([
                'social_name' => $request->input('social_name'),
                'mother_name' => $request->input('mother_name'),
                'father_name' => $request->input('father_name'),
                'observation' => $request->input('observation'),
                'responsible_name' => $request->input('responsible_name'),
                'responsible_phone' => $request->input('responsible_phone'),
            ]);
        }

        if($user->role->id == Role::DOCTOR ){
            Doctor::where('user_id', $user->id)->update([
                'crm' => $request->input('crm'),
                //'mother_name' => $request->input('mother_name'),
            ]);
        }

        $notification = array(
            'message' => 'Atualizado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->action('PatientController@index')->with($notification);
    }
}
