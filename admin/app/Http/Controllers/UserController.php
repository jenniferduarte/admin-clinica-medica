<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Role;
use App\Address;
use App\Gender;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UserUpdateRequest;
use Auth;
use App\Http\Requests\UserUpdatePasswordRequest;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('preventBackHistory');
    }

    public function store(UserStoreRequest $request)
    {
        /*
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

        return redirect()->action('UserController@index')->with($notification);
        */
    }

    public function show(User $user)
    {
        Gate::authorize('isAdmin');

        return view('admin.users.show', [
            'user' => $user
        ]);
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
        $date = $request->birth_date ?? null;

        if($date) {
            $day = substr($date, 0, 2);
            $month = substr($date, 2, 2);
            $year = substr($date, 4, 8);

            $date = Carbon::createFromFormat('Y-m-d', $year . '-' . $month . '-' . $day);
        }

        User::find($user->id)->update([
            'name'      =>  $request->input('name'),
            'cpf'       =>  $request->input('cpf'),
            'rg'        =>  $request->input('rg'),
            'birth_date'=>  $date,
            'phone'     =>  $request->input('phone'),
            'gender_id' =>  $request->input('gender'),
        ]);

        // Atualiza o endereço
        Address::find($user->addresses()->first()->id)->update([
            'street'            => $request->input('street'),
            'number'            => $request->input('number'),
            'district'          => $request->input('district'),
            'complement'        => $request->input('complement'),
            'state'             => $request->input('state'),
            'country'           => $request->input('country'),
            'cep'               => $request->input('cep'),
            'city'              => $request->input('city'),
        ]);

        $notification = array(
            'message' => 'Atualizado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->action('UserController@edit', $user->id)->with($notification);
    }

    public function destroy(User $user)
    {
        Gate::authorize('delete', $user);

        # Exclui o usuário
        $user->delete();

        $notification = array(
            'message' => 'Excluído com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->action('UserController@index')->with($notification);
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
