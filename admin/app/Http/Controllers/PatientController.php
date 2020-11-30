<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use App\Gender;
use App\History;
use App\User;
use App\Role;
use App\Address;
use Auth;
use App\Http\Requests\PatientStoreRequest;
use App\Http\Requests\PatientUpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('viewAny', Auth::user());

        $patients = Patient::all();

        return view('admin.patients.index', [
            'patients' => $patients
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

        return view('admin.patients.create', [
            'genders' =>  Gender::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientStoreRequest $request)
    {
        Gate::authorize('create', Auth::user());

        // Gera uma senha aleatória
        // Padrão: 5 primeiros caracteres do email do usuário + 3 dígitos aleatórios. Em caixa alta
        $numbers = [0,1,2,3,4,5,6,7,8,9];
        $password = strtoupper(substr(str_replace(" ", "", $request->input('email')), 0,5) . array_rand($numbers, 1) . array_rand($numbers, 1) . array_rand($numbers, 1));

        // Cria o usuário
        $user = User::create([
            'name'          => $request->input('name'),
            'email'         => $request->input('email'),
            'password'      => Hash::make($password),
            'role_id'       => Role::PATIENT,
            'cpf'           => $request->input('cpf'),
            'rg'            => $request->input('rg'),
            'birth_date'    => $request->input('birth_date'),
            'phone'         => $request->input('phone'),
            'gender_id'     => $request->input('gender'),
            'clinic_id'     => 1
        ]);

        // Cria o paciente
        Patient::create([
            'user_id'           => $user->id,
            'social_name'       => $request->input('social_name'),
            'mother_name'       => $request->input('mother_name'),
            'father_name'       => $request->input('father_name'),
            'observation'       => $request->input('observation'),
            'responsible_name'  => $request->input('responsible_name'),
            'responsible_phone' => $request->input('responsible_phone'),
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
            'message' => 'Criado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->action('PatientController@index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        Gate::authorize('view', $patient);

        $history = History::where('patient_id', $patient->id)->get()->first();
        $records = [];

        if($history != null){
           $records =  $history->records->sortByDesc('created_at');
        }

        if (Auth::user()->role->id == Role::DOCTOR) {
            return view('admin.patients.show_doctor', [
                'patient' => $patient,
                'records' => $records
            ]);
        }
        return view('admin.patients.show', [
            'patient' => $patient
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        Gate::authorize('update', $patient);

        return view('admin.patients.edit', [
            'patient' => $patient,
            'genders' =>  Gender::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(PatientUpdateRequest $request, Patient $patient)
    {
        Gate::authorize('update', $patient);

        // Atualiza o usuário
        $user = User::find($patient->user_id)->update([
            'name'          => $request->input('name'),
            'cpf'           => $request->input('cpf'),
            'rg'            => $request->input('rg'),
            'phone'         => $request->input('phone'),
            'gender_id'     => $request->input('gender'),
            'birth_date'    => $request->input('birth_date'),
        ]);

        // Atualiza o paciente
        Patient::find($patient->id)->update([
            'social_name'       => $request->input('social_name'),
            'mother_name'       => $request->input('mother_name'),
            'father_name'       => $request->input('father_name'),
            'observation'       => $request->input('observation'),
            'responsible_name'  => $request->input('responsible_name'),
            'responsible_phone' => $request->input('responsible_phone'),
        ]);

        // Atualiza o endereço
        Address::find($patient->user->addresses()->first()->id)->update([
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

        return redirect()->action('PatientController@edit', $patient->id)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        Gate::authorize('delete', $patient);

        # Exclui o usuário e o paciente
        $patient->user->delete();
        $patient->delete();

        $notification = array(
            'message' => 'Excluído com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->action('PatientController@index')->with($notification);
    }
}
