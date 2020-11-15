<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Role;
use App\Patient;
use App\Gender;
use App\Http\Requests\UserUpdateRequest;
use Auth;
use App\Http\Requests\UserUpdatePasswordRequest;


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

    public function show(User $user)
    {

    }

    public function edit(User $user)
    {
        if ($user->role->id == Role::PATIENT) {
            return redirect()->action('PatientController@edit', $user->patients->first->id);
        }

        if ($user->role->id == Role::DOCTOR) {
            return redirect()->action('DoctorController@edit', $user->doctors->first->id);
        }

        return view('admin.users.edit', [
            'user'      => $user,
            'genders'   => Gender::all()
        ]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        User::find($user->id)->update([
            'name'      => $request->input('name'),
            'cpf'       =>  $request->input('cpf'),
            'rg'        =>  $request->input('rg'),
            'birth_date'=>  $request->input('birth_date'),
            'phone'     =>  $request->input('phone'),
            'gender_id' =>  $request->input('gender'),
        ]);


       /* if($user->role->id == Role::PATIENT ){
            return redirect()->action('PatientController@edit');

            Patient::where('user_id', $user->id)->update([
                'social_name'       => $request->input('social_name'),
                'mother_name'       => $request->input('mother_name'),
                'father_name'       => $request->input('father_name'),
                'observation'       => $request->input('observation'),
                'responsible_name'  => $request->input('responsible_name'),
                'responsible_phone' => $request->input('responsible_phone'),
            ]);
        }

        if($user->role->id == Role::DOCTOR ){
            Doctor::where('user_id', $user->id)->update([
                'crm' => $request->input('crm'),
                //'mother_name' => $request->input('mother_name'),
            ]);
        }
        */

        $notification = array(
            'message' => 'Atualizado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->action('HomeController@index')->with($notification);
    }

    public function editPassword()
    {
        return view('admin.users.edit-password');
    }

    public function updatePassword(UserUpdatePasswordRequest $request)
    {
        $user = Auth::user();

        $user->password = Hash::make($request->password);
        $user->save();

        $notification = array(
            'message' => 'Senha alterada com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->action('UserController@updatePassword')->with($notification);
    }
}
