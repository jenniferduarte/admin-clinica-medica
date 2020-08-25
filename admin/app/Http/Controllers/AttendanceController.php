<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Doctor;
use App\Patient;
use App\Status;
use App\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AttendanceStoreRequest;
use Illuminate\Http\Request;

class AttendanceController extends Controller
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
    public function index(Request $request)
    {
        $attendances = Attendance::all();

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
            ->select('schedules.start_date as start', 'schedules.end_date as end', 'attendances.id as attendance_id')
            ->get();

        $attendances = [];
       
        foreach($attendancesResults as $attendanceResult)
        {   
            $attendance = Attendance::find($attendanceResult->attendance_id);

            $attendances[] = [
                'start' => Carbon::parse($attendanceResult->start)->toIso8601String(),
                'end'   => Carbon::parse($attendanceResult->end)->toIso8601String(),
                'title' => $attendance->doctor->treatment . ' ' . ucwords($attendance->doctor->user->name),
                'url' => '/attendences/'.$attendanceResult->attendance_id,
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

        Attendance::create([
            'patient_id' => $request->input('patient'),
            'doctor_id' => $request->input('doctor'),
            'schedule_id' => $schedule->id,
            'status_id' => Status::SCHEDULED,
            'clinic_id' => 1,
        ]);

        $schedule->vacant = 0;
        $schedule->save();

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
        //dd($attendance);
        return view('admin.attendances.show', [
            'attendances' => $attendance
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
}
