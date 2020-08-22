<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;
use App\Doctor;
use App\Http\Requests\ScheduleStoreRequest;
use Carbon\Carbon;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Doctor $doctor)
    {
        return view('admin.schedules.index', [
            'schedules' => Schedule::all(),
            'doctor' => $doctor
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Doctor $doctor)
    {
        return view('admin.schedules.create', [
            'doctor' => $doctor
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleStoreRequest $request, Doctor $doctor)
    {
        $dates = explode(',', $request->input('date'));

        if($dates){
            foreach($dates as $date){

                $date = explode('/', $date);
                $time_start = explode(':', $request->input('start_time'));
                $time_end = explode(':', $request->input('end_time'));

                # ano, mes, dia, hora, minuto, segundo ("00" como default)
                $start_date = Carbon::create($date[2], $date[1], $date[0], $time_start[0], $time_start[1], 00);
                $end_date = Carbon::create($date[2], $date[1], $date[0], $time_end[0], $time_end[1], 00);

                # Verifica se já existe horario cadastrado pra o médico e o dia em questão
                if(count(
                    Schedule::where([
                        ['doctor_id', '=', $doctor->id],
                        ['start_date', '=', $start_date]
                    ])->get()
                )){
                    return back()->withErrors(['date' => ["Já existe um horário cadastrado para " .$start_date->format('d/m/yy h:s') ]]);
                }

                # Persiste os horários na base
                while($start_date <= $end_date)
                {
                    $schedule = New Schedule;
                    $schedule->consultation_time = $request->input('consultation_time');
                    $schedule->start_date = $start_date->toDateTimeString();
                    $start_date->addMinutes($request->input('consultation_time'));  # Incrementa os minutos, capturados de forma dinâmica
                    $schedule->end_date = $start_date->toDateTimeString();
                    $schedule->doctor_id = $doctor->id;
                    $schedule->clinic_id = 1;
                    $schedule->save();
                }
            }
        }
    
        $notification = array(
            'message' => 'Criado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->action('ScheduleController@store', $doctor)->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
