@extends('admin.layout.template')

@section('page-name') {{ $doctor->treatment }} {{ $doctor->user->name }} › Horários @endsection {{-- Page Name  --}}

@section('quick-actions')
<a href="{{ route('doctors.schedules.create', $doctor->id) }}" class="btn btn-block btn-outline-success btn-sm">
    <i class="nav-icon fas fa-user-md"></i>  Novos horários 
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
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Tempo da consulta</th>
                    <th>Vago</th>
                    <th>Ativo</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->id }}</td>
                    <td>{{ date('d/m/Y', strtotime($schedule->start_date)) }}</td>
                    <td>{{ date('H:i', strtotime($schedule->start_date)) }} - {{ date('H:i', strtotime($schedule->end_date)) }}</td>
                    <td>{{ $schedule->consultation_time }}</td>
                    <td>{{ $schedule->vacant ? 'Sim' : 'Não' }}</td>
                    <td>{{ $schedule->active ? 'Sim' : 'Não' }}</td>
                    <td> 
                        <div class="btn-group" role="group">
                            <a href="{{ route('doctors.schedules.show', [$schedule->id, $doctor->id]) }}" class="btn btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>   
                            <a href="{{ route('doctors.schedules.edit', [$schedule->id, $doctor->id]) }}" class="btn btn-secondary">
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

