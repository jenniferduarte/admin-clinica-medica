<?php

namespace App\Http\Controllers;

use App\Medicament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\MedicamentStoreRequest;

class MedicamentController extends Controller
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
        Gate::authorize('viewAny', Medicament::class);

        $medicaments = Medicament::all();

        return view('admin.medicaments.index', [
            'medicaments' => $medicaments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create', Medicament::class);

        return view('admin.medicaments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicamentStoreRequest $request)
    {
        Gate::authorize('create', Medicament::class);

        $medicament = Medicament::create($request->all());

        $notification = array(
            'message' => 'Criado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->action('MedicamentController@index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */
    public function show(Medicament $medicament)
    {
        Gate::authorize('view', $medicament);

        return view('admin.medicaments.show', [
            'medicament' => $medicament
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicament $medicament)
    {
        Gate::authorize('update', $medicament);

        return view('admin.medicaments.edit', [
            'medicament' => $medicament
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */
    public function update(MedicamentStoreRequest $request, Medicament $medicament)
    {
        Gate::authorize('update', $medicament);

        $medicament->update($request->all());

        $notification = array(
            'message' => 'Atualizado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->action('MedicamentController@edit', $medicament->id)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicament $medicament)
    {
        Gate::authorize('delete', $medicament);

        $medicament->delete();

        $notification = array(
            'message' => 'Excluído com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->action('MedicamentController@index')->with($notification);
    }
}
