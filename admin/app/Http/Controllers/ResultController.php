<?php

namespace App\Http\Controllers;

use App\Result;
use App\Doctor;
use App\Patient;
use App\Laboratory;
use Illuminate\Http\Request;
use App\Http\Requests\ResultStoreRequest;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Auth;
use App\Role;
use App\Policies\ResultPolicy;


class ResultController extends Controller
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
        Gate::authorize('viewAny', Result::class);

        $results = Result::all();

        if(Auth::user()->role_id == Role::LABORATORY){
            $results = Result::where('laboratory_id', Auth::user()->laboratory->id)->get();
        }

        if (Auth::user()->role_id == Role::PATIENT) {
            $results = Result::where([['patient_id', Auth::user()->patients->first()->id], ['show_to_patient', 1] ])->get();
        }

        if (Auth::user()->role_id == Role::DOCTOR) {
            $results = Result::where('doctor_id', Auth::user()->doctors->first()->id)->get();
        }

        return view('admin.results.index', [
            'results' => $results
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // Gate::authorize('create');

        $doctors = Doctor::all();
        $pacients = Patient::all();
        $laboratories = Laboratory::all();

        return view('admin.results.create', [
            'doctors'       => $doctors,
            'patients'      => $pacients,
            'laboratories'  => $laboratories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResultStoreRequest $request)
    {
        Gate::authorize('create', 'App\Result');

        $file = $request->file;

        $laboratory_id = $request->laboratory_id;

        if(Auth::user()->role_id == Role::LABORATORY){
            $laboratory_id = Auth::user()->laboratory->id;
        }

        $doctor_id = $request->doctor_id;
        $patient_id = $request->patient_id;
        $filename = Carbon::now()->timestamp.'_'.$file->getClientOriginalName();

        Storage::putFileAs('results/'.$laboratory_id, $file, $filename);

        $result = Result::create([
            'doctor_id'         => $doctor_id,
            'patient_id'        => $patient_id,
            'laboratory_id'     => $laboratory_id,
            'filepath'          => 'results/'.$laboratory_id.'/'.$filename,
            'file_original_name'=> $file->getClientOriginalName(),
            'show_to_patient'   => $request->show_to_patient
        ]);

        $notification = array(
            'message' => 'Criado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->action('ResultController@index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        Gate::authorize('view', $result);

        return view('admin.results.show', [
            'result' => $result,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        Gate::authorize('update', $result);

        $doctors = Doctor::all();
        $pacients = Patient::all();
        $laboratories = Laboratory::all();

        return view('admin.results.edit', [
            'result'        => $result,
            'doctors'       => $doctors,
            'patients'      => $pacients,
            'laboratories'  => $laboratories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //Gate::authorize('update', 'App\Result');

        $laboratory_id = $request->laboratory_id;

        if (Auth::user()->role_id == Role::LABORATORY) {
            $laboratory_id = Auth::user()->laboratory->id;
        }

        $doctor_id = $request->doctor_id;
        $patient_id = $request->patient_id;


        $file = null;
        if ($request->file) {

            $file = $request->file;
            $filename = Carbon::now()->timestamp . '_' . $file->getClientOriginalName();

            Storage::putFileAs('results/' . $laboratory_id, $file, $filename);

            $result = $result->update([
                'filepath'           => 'results/' . $laboratory_id . '/' . $filename,
                'file_original_name' => $file->getClientOriginalName(),
                'doctor_id'         => $doctor_id,
                'patient_id'        => $patient_id,
                'laboratory_id'     => $laboratory_id,
                'show_to_patient'   => $request->show_to_patient
            ]);
        }else{
            $result = $result->update([
                'doctor_id'         => $doctor_id,
                'patient_id'        => $patient_id,
                'laboratory_id'     => $laboratory_id,
                'show_to_patient'   => $request->show_to_patient
            ]);
        }

        $notification = array(
            'message' => 'Atualizado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->action('ResultController@index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        Gate::authorize('delete', $result);

        # Exclui o resultado
        $result->delete();

        $notification = array(
            'message'       => 'Excluído com sucesso!',
            'alert-type'    => 'success'
        );

        return redirect()->action('ResultController@index')->with($notification);
    }
}
