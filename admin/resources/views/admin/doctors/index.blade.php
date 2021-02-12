@extends('admin.layout.template')

@section('page-name') Médicos @endsection {{-- Page Name  --}}

@section('quick-actions')
<span class="quick-actions">
    <a href="{{ route('doctors.create') }}" class="btn btn-block btn-outline-success btn-sm">
        <i class="nav-icon fas fa-user-md"></i>  Novo médico
    </a>
</span>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card card-primary">
    <div class="card-body">

        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th data-priority="1">Nome</th>
                    <th>Especialidade</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th data-priority="2">Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->id }} </td>
                    <td>{{ $doctor->user->name }} </td>
                    <td> @foreach($doctor->specialties as $specialty) {{ $specialty->name }} @if(!$loop->last)|@endif @endforeach</td>
                    <td>{{ $doctor->user->email }} </td>
                    <td>{{ $doctor->user->cpf }} </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('doctors.show', $doctor->id) }}" class="btn btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-secondary">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="{{ route('doctors.schedules.index', $doctor->id) }}" class="btn btn-secondary">
                                <i class="fas fa-calendar-plus"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

