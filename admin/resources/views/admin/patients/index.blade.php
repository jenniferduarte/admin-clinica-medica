@extends('admin.layout.template')

@section('page-name') Pacientes @endsection {{-- Page Name  --}}

@section('quick-actions')
<a href="{{ route('patients.create') }}" class="btn btn-block btn-outline-success btn-sm">
    <i class="nav-icon fas fa-user-injured"></i>  Novo Paciente
</a>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

@can(!'isPatient')
<div class="card card-primary">
    <div class="card-body">

        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Nome social</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($patients as $patient)
                <tr>
                    <td>{{ $patient->id }} </td>
                    <td>{{ $patient->user->name }} </td>
                    <td>{{ $patient->social_name }} </td>
                    <td>{{ $patient->user->email }} </td>
                    <td>{{ $patient->user->cpf }} </td>
                    <td> 
                        <div class="btn-group" role="group">
                            <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>   
                            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-secondary">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endcan 
@endsection

