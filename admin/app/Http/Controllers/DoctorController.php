<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;
use App\Gender;
use App\Specialty;
use App\User;
use App\Role;
use App\Schedule;
use App\Address;
use Carbon\Carbon;
use App\Http\Requests\DoctorStoreRequest;
use App\Http\Requests\DoctorUpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;

class DoctorController extends Controller
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

        $doctors = Doctor::all();

        return view('admin.doctors.index', [
            'doctors' => $doctors
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

        return view('admin.doctors.create', [
            'genders' =>  Gender::all(),
            'specialties' => Specialty::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorStoreRequest $request)
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
            'role_id'       => Role::DOCTOR,
            'cpf'           => $request->input('cpf'),
            'rg'            => $request->input('rg'),
            'birth_date'    => $request->input('birth_date'),
            'phone'         => $request->input('phone'),
            'gender_id'     => $request->input('gender'),
            'clinic_id'     => 1
        ]);

        // Cria o paciente
        $doctor = Doctor::create([
            'user_id'   => $user->id,
            'crm'       => $request->input('crm'),
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

        // Cadastro das especialidades
        if ($request->has('specialties')) {
            $specialties = $request->input('specialties');

            foreach ($specialties as $specialty_id) {
                $specialty = Specialty::find($specialty_id);
                $doctor->specialties()->save($specialty);
            }
        }

        Mail::to($user)->send(new UserRegistered($user, $password));

        $notification = array(
            'message'       => 'Criado com sucesso!',
            'alert-type'    => 'success'
        );

        return redirect()->action('DoctorController@index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        Gate::authorize('view', $doctor);

        return view('admin.doctors.show', [
            'doctor' => $doctor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        Gate::authorize('update', $doctor);

        return view('admin.doctors.edit', [
            'doctor'        => $doctor,
            'genders'       => Gender::all(),
            'specialties'   => Specialty::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorUpdateRequest $request, Doctor $doctor)
    {
        Gate::authorize('update', $doctor);

        User::find($doctor->user_id)->update([
            'name'          => $request->input('name'),
            'cpf'           => $request->input('cpf'),
            'rg'            => $request->input('rg'),
            'phone'         => $request->input('phone'),
            'gender_id'     => $request->input('gender'),
            'birth_date'    => $request->input('birth_date'),
        ]);

        Doctor::find($doctor->id)->update([
            'crm' => $request->input('crm'),
        ]);

        // Atualiza o endereço
        Address::find($doctor->user->addresses()->first()->id)->update([
            'street'            => $request->input('street'),
            'number'            => $request->input('number'),
            'district'          => $request->input('district'),
            'complement'        => $request->input('complement'),
            'state'             => $request->input('state'),
            'country'           => $request->input('country'),
            'cep'               => $request->input('cep'),
            'city'              => $request->input('city'),
        ]);

        // Remove todas as categorias associadas e cadastra as novas
        $doctor->specialties()->detach();

        if ($request->has('specialties')) {
            $specialties = $request->input('specialties');

            foreach ($specialties as $specialty_id) {
                $specialty = Specialty::find($specialty_id);
                $doctor->specialties()->save($specialty);
            }
        }

        $notification = array(
            'message'       => 'Atualizado com sucesso!',
            'alert-type'    => 'success'
        );

        return redirect()->action('DoctorController@edit', $doctor->id)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        Gate::authorize('delete', $doctor);

        # Exclui o usuário e o médico
        $doctor->user->delete();
        $doctor->delete();

        $notification = array(
            'message'       => 'Excluído com sucesso!',
            'alert-type'    => 'success'
        );

        return redirect()->action('DoctorController@index')->with($notification);
    }

    public function availableDates(Request $request, Doctor $doctor)
    {
        $dates = Schedule::where([
            ['start_date', '>=', now()],
            ['doctor_id', '=', $doctor->id]
        ])->get();

        return json_encode($dates);
    }

    public function availableTimes(Request $request, Doctor $doctor)
    {
        $date = $request->date;

        $schedules = Schedule::whereDate('start_date', $date)->where([
            ['doctor_id', $doctor->id],
            ['vacant', 1]
        ])->get();

        return json_encode($schedules);
    }

    public function ajaxSearch(Request $request)
    {
        $search = $request->search;
        $response = [];

        if ($search == '') {
           $doctors = User::orderby('name','asc')->select('id', 'name')->where('role_id', ROLE::DOCTOR)->limit(10)->get();
        } else {
            $doctors = User::orderby('name', 'asc')->select('id', 'name')->where([
                ['role_id', '=', ROLE::DOCTOR ],
                ['name', 'like', '%' . $search . '%']
            ])->limit(10)->get();
        }

        foreach ($doctors as $doctor) {
            $response[] = array(
                "id" => $doctor->id,
                "text" => $doctor->name
            );
        }

        return json_encode($response);
        exit;

        /*
        return response()->json([
            'data' => $doctors
        ], 200);
        */
    }
}
