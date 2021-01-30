<?php

namespace App\Http\Controllers;

use App\Laboratory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\LaboratoryStoreRequest;
use App\Http\Requests\LaboratoryUpdateRequest;
use App\User;
use App\Gender;
use App\Role;

class LaboratoryController extends Controller
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
        Gate::authorize('isAdmin');

        $laboratories = Laboratory::all();


        return view('admin.laboratories.index', [
            'laboratories' => $laboratories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('isAdmin');

        // Só mostra os usuários do tipo laboratório que não possuem vinculo com nenhum laboratório.

        $users_ids = User::where([['role_id', Role::LABORATORY], ['active', 1]])->pluck('id')->toArray();

        $labs_users_ids = Laboratory::all()->pluck('user_id')->toArray();

        $users_without_lab = array_diff($users_ids, $labs_users_ids);

        $users = User::find($users_without_lab);

        return view('admin.laboratories.create', [
            'users'     => $users,
            'genders'   => Gender::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LaboratoryStoreRequest $request)
    {
        Gate::authorize('isAdmin');

        //$user = User::create($request->all());

        $laboratory = Laboratory::create($request->all());

        $notification = array(
            'message' => 'Criado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->action('LaboratoryController@index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratory $laboratory)
    {
        Gate::authorize('isAdmin');

        return view('admin.laboratories.show', [
            'laboratory' => $laboratory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratory $laboratory)
    {
        Gate::authorize('isAdmin');

        $users = User::where([['role_id', Role::LABORATORY], ['active', 1]])->get();

        return view('admin.laboratories.edit', [
            'laboratory' => $laboratory,
            'users'      => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function update(LaboratoryUpdateRequest $request, Laboratory $laboratory)
    {
        Gate::authorize('isAdmin');

        $laboratory->update($request->all());

        $notification = array(
            'message' => 'Atualizado com sucesso!',
            'alert-type' => 'success'
        );

       return redirect()->action('LaboratoryController@edit', $laboratory->id)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratory $laboratory)
    {
        Gate::authorize('isAdmin');

        $laboratory->delete();

        $notification = array(
            'message' => 'Excluído com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->action('LaboratoryController@index')->with($notification);
    }
}
