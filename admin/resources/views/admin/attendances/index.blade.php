@extends('admin.layout.template')

@section('page-name') Agendamentos @endsection {{-- Page Name  --}}

@section('quick-actions')
<span class="quick-actions">
    @can('scheduleAttendance')
    <a href="{{ route('attendances.create') }}" class="btn btn-block btn-outline-success btn-sm">
        <i class="nav-icon fas fa-user-md"></i>  Agendar consulta
    </a>
    @endcan
</span>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card card-primary card-outline card-outline-tabs">
    <div class=" card-header p-0 border-bottom-0">
      <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item"><a class="nav-link active" href="#calendar-tab" data-toggle="tab">
          <i class="fas fa-calendar-alt"></i> Calendário</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="#cards-tab" data-toggle="tab">
          <i class="fas fa-th-large"></i> Cards</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content">
        {{-- Calendar Tab --}}
        <div class="tab-pane active" id="calendar-tab">
          <div id='calendar'></div>
        </div>

        {{-- Cards Tab --}}
        <div class="tab-pane" id="cards-tab">
          <br>
          <h4 class="text-primary"><i class="fas fa-arrow-right text-info"></i> Próximas consultas</h4>
          <br>
          <div class="row">

            {{-- Loop com as próximas consultas --}}
            @foreach($attendances->sortBy('status') as $attendance)
                @if($attendance->schedule->start_date >= now())
                <div class="col-md-6">
                  <div class="card bg-light">
                      <div class="card-header border-bottom-0">
                        <strong><i class="fas fa-clock mr-1"></i>
                          {{ $attendance->schedule->start_date->format('d/m/Y H:i') }}
                        </strong>
                        <span class="badge badge-{{ $attendance->status->name }} uppercase right">
                          @if($attendance->status->id == Status::SCHEDULED) agendado @endif
                          @if($attendance->status->id == Status::CANCELED) cancelado @endif
                          @if($attendance->status->id == Status::ABSENT_PATIENT) paciente ausente @endif
                        </span>
                      </div>
                      <br>
                      <div class="card-body pt-0">
                        <div class="row">
                          <div class="col-md-7">
                            <h2 class="lead"><b>{{ $attendance->doctor->treatment }} {{ $attendance->doctor->user->name }}</b></h2>
                            <p class="text-muted text-sm">
                              <strong> Especialista em: </strong>
                              @foreach($attendance->doctor->specialties as $specialty)
                                {{ $specialty->name }} @if(!$loop->last) / @endif
                              @endforeach
                            </p>
                            <ul class="mb-2 ml-3 fa-ul text-muted">
                              <li class="small"><span class="fa-li"><i class="fas fa-lg fa-at"></i></span>
                                {{ $attendance->doctor->user->email }}
                              </li>

                              @if($attendance->doctor->user->phone)
                              <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                {{ $attendance->doctor->user->phone }}
                              </li>
                              @endif
                            </ul>
                          </div>
                        </div>

                        <div class="text-ht mt-4">
                          <a href="{{ route('attendances.show', $attendance->id) }}" class="btn btn-sm bg-secondary col-md-2 col-sm-12">
                            <i class="fas fa-plus"></i>
                            Ver detalhes
                          </a>
                        </div>
                      </div>
                  </div>
                </div>
                @endif
            @endforeach
          </div>
          <hr>

          <br>
          <h4 class="text-secondary"><i class="fas fa-arrow-left text-secondary"></i> Consultas passadas</h4>
          <br>
          <div class="row opacity">
            {{-- Loop com as próximas passadas --}}
            @foreach($attendances->sortBy('status') as $attendance)
              @if($attendance->schedule->start_date < now())
                <div class="col-md-6">
                  <div class="card bg-light">
                        <div class="card-header border-bottom-0">
                            <strong><i class="fas fa-clock mr-1"></i>
                            {{ $attendance->schedule->start_date->format('d/m/Y H:i') }}
                            </strong>
                            <span class="badge badge-{{ $attendance->status->name }} uppercase right">
                            @if($attendance->status->id == Status::SCHEDULED) agendado @endif
                            @if($attendance->status->id == Status::CANCELED) cancelado @endif
                            @if($attendance->status->id == Status::ABSENT_PATIENT) paciente ausente @endif
                            </span>
                        </div>
                        <br>

                        @if(Auth::user()->role->id == Role::DOCTOR)
                        @include('admin.attendances._view_as_doctor')
                        @else
                        @include('admin.attendances._default_view')
                        @endif

                    </div>
                </div>
              @endif
            @endforeach
          </div>

        </div>
        {{-- Fim Cards Tab --}}

      </div>
    </div>
</div>

@endsection

