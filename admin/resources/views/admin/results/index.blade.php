@extends('admin.layout.template')

@section('page-name') Resultados de exames @endsection {{-- Page Name  --}}

@section('quick-actions')
<a href="{{ route('results.create') }}" class="btn btn-block btn-outline-success btn-sm">
    <i class="nav-icon fas fa-capsules"></i>  Adicionar resultado
</a>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card card-primary">
    <div class="card-body">

        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Médico</th>
                    <th>Paciente</th>
                    <th>Laboratório</th>
                    <th>Visível ao paciente</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($results as $result)
                <tr>
                    <td>{{ $result->id }} </td>
                    <td>{{ $result->doctor->treatment . ' ' . $result->doctor->user->name }} </td>
                    <td>{{ $result->patient->user->name . ' (' . $result->patient->user->email . ')' }} </td>
                    <td>{{ $result->laboratory->name  }} </td>
                    <td>{{ $result->show_to_patient ? 'Sim' : 'Não' }} </td>
                    <td>
                        <div class="btn-group" role="group">
                             <a href="{{ route('results.show', $result->id) }}" class="btn btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('results.edit', $result->id) }}" class="btn btn-secondary ">
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

@endsection

