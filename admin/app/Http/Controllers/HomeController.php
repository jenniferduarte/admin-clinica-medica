<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\Doctor;
use App\Status;
use App\Record;
use App\Attendance;
use App\User;
use App\Schedules;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('preventBackHistory');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $next_attendance = [];
        $doctor = null;
        $next_attendances = [];

        // Médico ou recepcionista
        if(Auth::user()->role->id == Role::DOCTOR || Auth::user()->role->id == Role::RECEPTIONIST){
            return redirect()->action('AttendanceController@index');
        }

        // Laboratory
        if (Auth::user()->role->id == Role::LABORATORY) {
            return redirect()->action('ResultController@index');
        }

        // Paciente
        if (Auth::user()->role->id == ROLE::PATIENT) {
            $patient_id = Auth::user()->patients->first()->id;

            $next_attendance = DB::table('attendances')
                ->where('attendances.patient_id', $patient_id)
                ->where('attendances.status_id', '=', Status::SCHEDULED)
                ->join('schedules', 'attendances.schedule_id', '=', 'schedules.id')
                ->where('schedules.start_date', '>', now())
                ->select('attendances.id', 'attendances.patient_id',
                        'attendances.doctor_id', 'schedules.start_date', 'attendances.status_id')
                ->orderBy('schedules.start_date', 'asc')
                ->limit(1)
                ->get()->first();

            if($next_attendance){
                $doctor = Doctor::find($next_attendance->doctor_id);
            }
        }

        // Admin
        $next_attendances = $this->nextAttendances(5);

        return view('home', [
            'next_attendance'   => $next_attendance,
            'doctor'            => $doctor,
            'next_attendances'  => $next_attendances
        ]);
    }

    public function dashboardAdmin()
    {
        // Consultas realizadas
        $records = count(Record::all());

        // Consultas canceladas
        $canceled_attendances = Attendance::where('status_id', Status::CANCELED)->count();

        // Médicos cadastrados
        $doctors = User::where('role_id', Role::DOCTOR)->count();

        // Pacientes cadastrados
        $patients = User::where('role_id', Role::PATIENT)->count();

        return response()->json([
            'records'               => $records,
            'canceled_attendances'  => $canceled_attendances,
            'doctors'               => $doctors,
            'patients'              => $patients
        ], 200);
    }

    public function topSpecialties($quantity = 5)
    {
        $top_specialties = DB::table('doctor_specialties')
            ->join('specialties', 'specialties.id', '=', 'doctor_specialties.specialty_id')
            ->select('doctor_specialties.specialty_id', 'specialties.name', \DB::raw("COUNT('specialty_id') AS value_occurrence"))
            ->orderBy('value_occurrence', 'desc')
            ->groupBy('specialty_id')
            ->take($quantity)
            ->get();

        return response()->json([
            'top_specialties' => $top_specialties
        ], 200);
    }

    public function doctorsAttendances($quantity = 5)
    {
        $doctors_attendances = DB::table('schedules')
            ->join('doctors', 'schedules.doctor_id', '=', 'doctors.id')
            ->join('users', 'doctors.user_id', '=', 'users.id')
            ->select('schedules.doctor_id', 'users.name', \DB::raw("COUNT('schedules.doctors_id') AS value_occurrence"))
            ->where('schedules.end_date', '<', now())
            ->where('schedules.vacant', 0)
            ->orderBy('value_occurrence', 'desc')
            ->groupBy('schedules.doctor_id')
            ->take($quantity)
            ->get();

        return response()->json([
            'doctors_attendances' => $doctors_attendances
        ], 200);
    }

    private function nextAttendances($quantity = 5)
    {
        $next_attendances = DB::table('attendances')
            ->where('attendances.status_id', '=', Status::SCHEDULED)
            ->join('schedules', 'attendances.schedule_id', '=', 'schedules.id')
            ->join('doctors', 'attendances.doctor_id', '=', 'doctors.id')
            ->join('users', 'doctors.user_id', '=', 'users.id')
            ->where('schedules.start_date', '>', now())
            ->select(
                'attendances.id',
                'attendances.patient_id',
                'attendances.doctor_id',
                'schedules.start_date',
                'schedules.end_date',
                'attendances.status_id',
                'users.name as doctor_name'
            )
            ->orderBy('schedules.start_date', 'asc')
            ->limit(5)
            ->get();

        return $next_attendances;
    }
}
