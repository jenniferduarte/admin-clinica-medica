@extends('admin.layout.template')

@section('page-name') Agendamento @endsection {{-- Page Name  --}}

@section('quick-actions')
<a href="{{ route('attendances.create') }}" class="btn btn-block btn-outline-success btn-sm">
    <i class="nav-icon fas fa-user-md"></i>  Marcar consulta
</a>
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
            <strong><i class="fas fa-clock mr-1"></i> Data e hora </strong>

            <p class="text-muted">
                Dia {{ $attendance->schedule->start_date->format('d/m/Y') }} das {{ $attendance->schedule->start_date->format('H:i') }}
                as {{ $attendance->schedule->end_date->format('H:i') }}
            </p>

            <hr>

            <strong><i class="fas fa-user-md mr-1"></i> Médico </strong>

            <p class="text-muted">
                <strong>{{ $attendance->doctor->treatment }} {{ $attendance->doctor->user->name }} </strong> <br>
                {{ $attendance->doctor->user->email }} <br>
                
                @foreach($attendance->doctor->specialties as $specialty)
                    {{ $specialty->name }} @if(!$loop->last) | @endif
                @endforeach

                <br><br>
                <a href="{{ route('doctors.show', $attendance->doctor->id)}}" 
                    class="btn btn-outline-secondary btn-sm">Ver perfil completo  <i class="fas fa-arrow-right"></i> 
                </a>
            </p>

            <hr>

            <strong><i class="fas fa-user-injured mr-1"></i> Paciente</strong>

            <p class="text-muted"> 
                <strong> {{ $attendance->patient->user->name }} </strong> <br>

                {{ $attendance->patient->user->email }} <br> 
                CPF: {{ $attendance->patient->user->cpf }} 

                <br><br>
                <a href="{{ route('patients.show', $attendance->patient->id)}}" 
                    class="btn btn-outline-secondary btn-sm">Ver perfil completo <i class="fas fa-arrow-right"></i> 
                </a>
            </p>

            <hr>

            <strong><i class="fas fa-info-circle mr-1"></i> Status</strong> <br>
            <span class="badge badge-{{ $attendance->status->name }} uppercase right">
                @if($attendance->status->id == 1) agendado @endif
                @if($attendance->status->id == 2) confirmado @endif
                @if($attendance->status->id == 3) paciente ausente @endif
                @if($attendance->status->id == 4) cancelado @endif
                @if($attendance->status->id == 5) finalizado @endif
            </span>
 
        </div>
        <!-- /.card-body -->    
    </div>
</div>
    
    
@endsection

