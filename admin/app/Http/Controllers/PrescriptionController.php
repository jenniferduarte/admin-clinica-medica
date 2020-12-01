<?php

namespace App\Http\Controllers;

use App\Prescription;
use App\PrescriptionExam;
use App\PrescriptionMedicament;
use Illuminate\Http\Request;
use Auth;
use App\Role;

class PrescriptionController extends Controller
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

    public function indexExams()
    {
        $prescriptions = Prescription::where('type', Prescription::EXAM)->get();

        // TODO: finalizar
        if(Auth::user()->role_id == Role::PATIENT){

        }

        if (Auth::user()->role_id == Role::DOCTOR) {

        }

        return view('admin.prescriptions.index-exams', [
            'prescriptions' => $prescriptions
        ]);
    }


    public function indexMedicaments()
    {
        $prescriptions = Prescription::where('type', Prescription::MEDICAMENT)->get();

        // TODO: finalizar
        if (Auth::user()->role_id == Role::PATIENT) {
        }

        if (Auth::user()->role_id == Role::DOCTOR) {
        }

        return view('admin.prescriptions.index-medicaments', [
            'prescriptions' => $prescriptions
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        // TODO: fazer gate
       // Gate::authorize('view', $prescription);

        return view('admin.prescriptions.show', [
            'prescription' => $prescription
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}
