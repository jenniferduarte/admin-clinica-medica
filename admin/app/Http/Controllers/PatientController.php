<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use App\Gender;
use App\User;
use App\Role;
use App\Http\Requests\PatientStoreRequest;
use App\Http\Requests\PatientUpdateRequest;
use Illuminate\Support\Facades\Hash;

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
        // Cria o usuário
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => Role::PATIENT,
            'cpf' =>  $request->input('cpf'),
            'rg' =>  $request->input('rg'),
            'birth_date' =>  $request->input('birth_date'),
            'phone' =>  $request->input('phone'),
            'gender_id' =>  $request->input('gender'),
            'clinic_id' => 1
        ]);

        // Cria o paciente     
        Patient::create([
            'user_id' => $user->id,
            'social_name' => $request->input('social_name'),
            'mother_name' => $request->input('mother_name'),
            'father_name' => $request->input('father_name'),
            'observation' => $request->input('observation'),
            'responsible_name' => $request->input('responsible_name'),
            'responsible_phone' => $request->input('responsible_phone'),
        ]);
   
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
        User::find($patient->user_id)->update([
            'name'          => $request->input('name'),
            'cpf'           => $request->input('cpf'),
            'rg'            => $request->input('rg'),
            'phone'         => $request->input('phone'),
            'gender_id'     => $request->input('gender'),
            'birth_date'    => $request->input('birth_date'),
        ]);

        Patient::find($patient->id)->update([
            'social_name'       => $request->input('social_name'),
            'mother_name'       => $request->input('mother_name'),
            'father_name'       => $request->input('father_name'),
            'observation'       => $request->input('observation'),
            'responsible_name'  => $request->input('responsible_name'),
            'responsible_phone' => $request->input('responsible_phone'),
        ]);
        
        $notification = array(
            'message' => 'Atualizado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->action('PatientController@index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
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
