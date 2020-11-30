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

class ResponsibleController extends Controller
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

        $responsibles = User::where('role_id', Role::LABORATORY)->get();

        return view('admin.responsibles.index', [
            'responsibles' => $responsibles
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

        return view('admin.responsibles.create', [
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
            'role_id'       => Role::LABORATORY,
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

        return redirect()->action('ResponsibleController@index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function show(User $responsible)
    {
        Gate::authorize('view', $responsible);

        return view('admin.users.show', [
            'user' => $responsible
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function edit(User $responsible)
    {
        Gate::authorize('update', $responsible);

        return view('admin.users.edit', [
            'user'          => $responsible,
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
    public function update(UserUpdateRequest $request, User $responsible)
    {
        Gate::authorize('update', $responsible);

        User::find($responsible->id)->update([
            'name'          => $request->input('name'),
            'cpf'           => $request->input('cpf'),
            'rg'            => $request->input('rg'),
            'phone'         => $request->input('phone'),
            'gender_id'     => $request->input('gender'),
            'birth_date'    => $request->input('birth_date'),
        ]);

        // Atualiza o endereço
        Address::find($responsible->addresses()->first()->id)->update([
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

        return redirect()->action('ReceptionistController@edit', $responsible->id)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $responsible)
    {
        Gate::authorize('delete', $responsible);

        # Exclui o usuário
        $responsible->delete();

        $notification = array(
            'message'       => 'Excluído com sucesso!',
            'alert-type'    => 'success'
        );

        return redirect()->action('ResponsiblesController@index')->with($notification);
    }
}
