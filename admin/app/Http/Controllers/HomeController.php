<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\Doctor;
use App\Status;
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

        // Médico
        if(Auth::user()->role->id == Role::DOCTOR){
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

        return view('home', [
            'next_attendance' => $next_attendance,
            'doctor' => $doctor
        ]);
    }
}
