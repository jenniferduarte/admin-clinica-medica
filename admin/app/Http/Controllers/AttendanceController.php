<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Doctor;
use App\Patient;
use App\Status;
use App\Schedule;
use App\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AttendanceStoreRequest;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AttendenceScheduled;
use App\Mail\AttendenceCanceled;

class AttendanceController extends Controller
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
    public function index(Request $request)
    {
        $attendances = Attendance::all();

        if (Auth::user()->role->id == ROLE::PATIENT) {
            $patient_id = Auth::user()->patients->first()->id;
            $attendances = Attendance::where('patient_id', $patient_id)->get();
        }

        if (Auth::user()->role->id == ROLE::DOCTOR) {
            $doctor_id = Auth::user()->doctors->first()->id;
            $attendances = Attendance::where('doctor_id', $doctor_id)->get();
        }

        return view('admin.attendances.index', [
            'attendances' => $attendances
        ]);
    }

    public function ajaxIndexPerDate(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        $attendancesResults = DB::table('schedules')
            ->join('attendances', 'schedules.id', '=', 'attendances.schedule_id')
            ->whereBetween('schedules.start_date', [$start, $end])
            ->where('attendances.status_id', Status::SCHEDULED);

        if (Auth::user()->role->id == ROLE::DOCTOR) {
            $doctor_id = Auth::user()->doctors->first()->id;
            $attendancesResults = $attendancesResults->where('schedules.doctor_id', $doctor_id);
        }

        if (Auth::user()->role->id == ROLE::PATIENT) {
            $patient_id = Auth::user()->patients->first()->id;
            $attendancesResults = $attendancesResults->where('attendances.patient_id', $patient_id);
        }

        $attendancesResults = $attendancesResults->select('schedules.start_date as start', 'schedules.end_date as end', 'attendances.id as attendance_id')->get();

        $attendances = [];

        foreach($attendancesResults as $attendanceResult)
        {
            $attendance = Attendance::find($attendanceResult->attendance_id);

            $title = $attendance->doctor->treatment . ' ' . ucwords($attendance->doctor->user->name);
            if (Auth::user()->role->id == ROLE::DOCTOR) {
                $title = ucwords($attendance->patient->user->name);
            }

            $attendances[] = [
                'start' => Carbon::parse($attendanceResult->start)->toIso8601String(),
                'end'   => Carbon::parse($attendanceResult->end)->toIso8601String(),
                'title' => $title,
                'url' => '/attendances/'.$attendanceResult->attendance_id,
            ];
        }

        return response()->json($attendances, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attendances.create', [
            'doctors' => Doctor::all(),
            'patients' => Patient::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttendanceStoreRequest $request)
    {
        $schedule = Schedule::find($request->input('time'));

        $patient = Patient::find($request->input('patient'));

        // Força o paciente para que só agende uma consulta para ele mesmo
        if (Auth::user()->role->id == ROLE::PATIENT) {
            $patient = Patient::find(Auth::user()->patients->first()->id);
        }


        $attendance = Attendance::create([
            'patient_id' => $patient->id,
            'doctor_id' => $request->input('doctor'),
            'schedule_id' => $schedule->id,
            'status_id' => Status::SCHEDULED,
            'clinic_id' => 1,
        ]);

        $schedule->vacant = 0;
        $schedule->save();

        Mail::to($patient->user)->send(new AttendenceScheduled($attendance));

        $notification = array(
            'message'       => 'Agendado com sucesso!',
            'alert-type'    => 'success'
        );

        return redirect()->action('AttendanceController@index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        return view('admin.attendances.show', [
            'attendance' => $attendance
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    public function updateStatus(Attendance $attendance, Status $status)
    {
        $attendance->status_id = $status->id;
        $attendance->save();

        if($status->id == Status::CANCELED){
            $attendance->schedule->vacant = 1;
            $attendance->schedule->save();

            Mail::to($attendance->patient->user)->send(new AttendenceCanceled($attendance));
        }

        return response()->json($attendance, 200);
    }
}
