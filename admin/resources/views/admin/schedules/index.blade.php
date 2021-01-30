@extends('admin.layout.template')

@section('page-name') {{ $doctor->treatment }} {{ $doctor->user->name }} › Horários @endsection {{-- Page Name  --}}

@section('quick-actions')

<a href="#" class="btn btn-outline-secondary btn-sm goback">
    <i class="fas fa-arrow-left"></i>  Voltar
</a>

<a href="{{ route('doctors.schedules.create', $doctor->id) }}" class="btn btn-outline-success btn-sm">
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
                            <form id="deleteForm" action="{{ route('doctors.schedules.destroy', [$doctor, $schedule]) }}" method="post">
                                @method('delete') @csrf
                                <button type="submit" data-id="{{ $doctor->id }}" class="text-danger btn btn-delete"><i class="fas fa-trash-alt"></i> Deletar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

