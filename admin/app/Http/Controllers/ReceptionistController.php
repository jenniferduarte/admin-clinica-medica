<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Address;
use App\Gender;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;

class ReceptionistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('preventBackHistory');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('viewAny', Auth::user());

        $receptionists = User::where('role_id', Role::RECEPTIONIST)->get();

        return view('admin.receptionists.index', [
            'receptionists' => $receptionists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create', Auth::user());

        return view('admin.receptionists.create', [
            'genders' =>  Gender::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        Gate::authorize('create', Auth::user());

        // Gera uma senha aleatória
        // Padrão: 5 primeiros caracteres do email do usuário + 3 dígitos aleatórios. Em caixa alta
        $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $password = strtoupper(substr(str_replace(" ", "", $request->input('email')), 0, 5) . array_rand($numbers, 1) . array_rand($numbers, 1) . array_rand($numbers, 1));

        // Cria o usuário
        $user = User::create([
            'name'          => $request->input('name'),
            'email'         => $request->input('email'),
            'password'      => Hash::make($password),
            'role_id'       => Role::RECEPTIONIST,
            'cpf'           => $request->input('cpf'),
            'rg'            => $request->input('rg'),
            'birth_date'    => $request->input('birth_date'),
            'phone'         => $request->input('phone'),
            'gender_id'     => $request->input('gender'),
            'clinic_id'     => 1
        ]);

        // Cria o endereço
        Address::create([
            'street'            => $request->input('street'),
            'number'            => $request->input('number'),
            'district'          => $request->input('district'),
            'complement'        => $request->input('complement'),
            'state'             => $request->input('state'),
            'country'           => $request->input('country'),
            'cep'               => $request->input('cep'),
            'city'              => $request->input('city'),
            'responsible_type'  => 'App\User',
            'responsible_id'    => $user->id
        ]);

        Mail::to($user)->send(new UserRegistered($user, $password));

        $notification = array(
            'message'       => 'Criado com sucesso!',
            'alert-type'    => 'success'
        );

        return redirect()->action('ReceptionistController@index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function show(User $receptionist)
    {
        Gate::authorize('view', $receptionist);

        return view('admin.users.show', [
            'user' => $receptionist
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function edit(User $receptionist)
    {
        Gate::authorize('update', $receptionist);

        return view('admin.users.edit', [
            'user'          => $receptionist,
            'genders'       => Gender::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $receptionist)
    {
        Gate::authorize('update', $receptionist);

        User::find($receptionist->id)->update([
            'name'          => $request->input('name'),
            'cpf'           => $request->input('cpf'),
            'rg'            => $request->input('rg'),
            'phone'         => $request->input('phone'),
            'gender_id'     => $request->input('gender'),
            'birth_date'    => $request->input('birth_date'),
        ]);

        // Atualiza o endereço
        Address::find($receptionist->addresses()->first()->id)->update([
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
            'message'       => 'Atualizado com sucesso!',
            'alert-type'    => 'success'
        );

        return redirect()->action('ReceptionistController@edit', $receptionist->id)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $receptionist)
    {
        Gate::authorize('delete', $receptionist);

        # Exclui o usuário
        $receptionist->delete();

        $notification = array(
            'message'       => 'Excluído com sucesso!',
            'alert-type'    => 'success'
        );

        return redirect()->action('ReceptionistController@index')->with($notification);
    }
}
