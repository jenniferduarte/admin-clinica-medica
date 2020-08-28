<?php

namespace App\Http\Controllers;

use App\Record;
use App\Patient;
use App\History;
use App\Doctor;
use App\Role;
use App\Http\Requests\RecordStoreRequest;
use Auth;
use Illuminate\Http\Request;

class RecordController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Patient $patient)
    {   
        if (Auth::user()->role->id == Role::DOCTOR) {
            return view('admin.records.create', [
                'patient' => $patient
            ]);
        }

        return redirect('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecordStoreRequest $request, Patient $patient)
    {

        $doctor = Doctor::where('user_id', Auth::user()->id)->get();
     
        //Verifica se o cliente já tem algum histórico, se não tiver, cria um
        $patient_history = History::where('patient_id', $patient->id)->get();
        if(!count($patient_history))
        {
           History::create([
                'patient_id' => $patient->id
            ]);
        }
    
        $patient_history = History::where('patient_id', $patient->id)->get()[0];

        $record = Record::create([
            'anamnesis'             => $request->input('anamnesis'), 
            'family_history'        => $request->input('family_history'), 
            'treatment_plan'        => $request->input('treatment_plan'), 
            'history_id'            => $patient_history->id,
            'doctor_id'             => $doctor[0]->id,
            'diagnostic_conclusion' => $request->input('diagnostic_conclusion'), 
            'weight'                => $request->input('weight'), 
            'height'                => $request->input('height'), 
            'heart_rate'            => $request->input('heart_rate'), 
            'respiratory_frequency' => $request->input('respiratory_frequency'),
            'systolic_bp'           => $request->input('systolic_bp'), 
            'diastolic_bp'          => $request->input('diastolic_bp'), 
            'temperature'           => $request->input('temperature'), 
            'allergy'               => $request->input('allergy'), 
            'chronic_diseases'      => $request->input('chronic_diseases'),
            'hypertension'          => $request->input('hypertension'), 
            'diabetes'              => $request->input('diabetes'), 
            'smoker'                => $request->input('smoker'), 
            'drug_user'             => $request->input('drug_user'), 
            'expected_return'       => $request->input('expected_return')
        ]);

        $notification = array(
            'message' => 'Criado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->action('PatientController@show', $patient->id)->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient, Record $record)
    {
        return view('admin.records.show',[
            'patient' => $patient,
            'record'  => $record  
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        //
    }
}
