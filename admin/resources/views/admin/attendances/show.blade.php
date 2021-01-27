@extends('admin.layout.template')

@section('page-name') Agendamentos @endsection {{-- Page Name  --}}

@section('quick-actions')
@can('scheduleAttendance')
<a href="{{ route('attendances.create') }}" class="btn btn-block btn-outline-success btn-sm">
    <i class="nav-icon fas fa-user-md"></i>  Agendar consulta
</a>
@endcan
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card">

    <div class="card-header card-title"> Dados gerais
        <div class="card-tools">
            <small> Última atualização {{ $attendance->updated_at->format('d/m/Y H:i') }} </small>
        </div>
    </div>

    <div class="card-body">

        <strong><i class="fas fa-info-circle mr-1"></i> Status</strong> <br>
        <span class="badge badge-{{ $attendance->status->name }} uppercase right">
            @if($attendance->status->id == Status::SCHEDULED) agendado @endif
            @if($attendance->status->id == Status::CANCELED) cancelado @endif
            @if($attendance->status->id == Status::ABSENT_PATIENT) paciente ausente @endif
        </span>

        <hr>

        <strong><i class="fas fa-clock mr-1"></i> Data e hora </strong>

        <p class="text-muted">
            Dia {{ $attendance->schedule->start_date->format('d/m/Y') }} das {{ $attendance->schedule->start_date->format('H:i') }}
            as {{ $attendance->schedule->end_date->format('H:i') }}
        </p>

        <hr>

        @cannot('isDoctor')
        <strong><i class="fas fa-user-md mr-1"></i> Médico </strong>

        <p class="text-muted">
            <strong>{{ $attendance->doctor->treatment }} {{ $attendance->doctor->user->name }} </strong> <br>
            {{ $attendance->doctor->user->email }} <br>

            @foreach($attendance->doctor->specialties as $specialty)
                {{ $specialty->name }} @if(!$loop->last) | @endif
            @endforeach

        </p>

        <hr>
        @endcan


        @cannot('isPatient')
        <strong><i class="fas fa-user-injured mr-1"></i> Paciente</strong>

        <p class="text-muted">
            <strong> {{ $attendance->patient->user->name }} </strong> <br>

            {{ $attendance->patient->user->email }} <br>
            CPF: {{ $attendance->patient->user->cpf }}
        </p>

        <hr>
        @endcan

        <div class="float-right">

        @can('isDoctor')
        <br><br>
        <a href="{{ route('patients.show', $attendance->patient->id)}}"
            class="btn btn-outline-secondary btn-sm">Ver perfil
        </a>
        @endcan

        @if($attendance->status->id == Status::SCHEDULED)

            @can('cancelAttendance', $attendance)
                <a href="#" class="btn btn-sm bg-danger update-attendance-status"
                    data-attendance="{{$attendance->id}}" data-status="{{ Status::CANCELED }}">
                    <i class="fas fa-times"></i> Cancelar agendamento
                </a>
            @endcan

            @can('addRecord', $attendance)
                <a href="{{ route('patients.records.create', $attendance->patient->id) }}"
                    class="btn btn-sm bg-success">
                    <i class="fas fa-bookmark"></i>  Iniciar atendimento
                </a>
            @endcan
        </div>

        @endif

    </div>
    <!-- /.card-body -->

    <div class="overlay d-none">
        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
    </div>
</div>
@endsection

