@extends('admin.layout.template')

@section('page-name') Resultados de exames @endsection {{-- Page Name  --}}

@section('quick-actions')
<span class="quick-actions">
    @can('addExamResults')
    <a href="{{ route('results.create') }}" class="btn btn-block btn-outline-success btn-sm">
        <i class="nav-icon fas fa-capsules"></i>  Adicionar resultado
    </a>
    @endcan
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
                    <th data-priority="1">Médico</th>
                    <th>Paciente</th>
                    <th>Laboratório</th>
                    @can('isDoctor')<th>Visível ao paciente</th>@endcan
                    <th>Última atualização</th>
                    <th data-priority="2">Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($results as $result)
                <tr>
                    <td>{{ $result->id }} </td>

                    <td>{{ $result->doctor->treatment . ' ' . $result->doctor->user->name }} </td>

                    <td>{{ $result->patient->user->name . ' (' . $result->patient->user->email . ')' }} </td>

                    <td>{{ $result->laboratory->name  }} </td>

                    @can('isDoctor')
                    <td>{{ $result->show_to_patient ? 'Sim' : 'Não' }} </td>
                    @endcan

                    <td>{{ $result->updated_at->format('d/m/Y H:s:i') }} </td>

                    <td>
                        <div class="btn-group" role="group">
                            @can('view', $result)
                            <a href="{{ route('results.show', $result->id) }}" class="btn btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>
                            @endcan

                            @can('update', $result)
                            <a href="{{ route('results.edit', $result->id) }}" class="btn btn-secondary ">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            @endcan
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

