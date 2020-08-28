@extends('admin.layout.template')

@section('page-name') Ver Paciente › {{ $patient->user->name }} @endsection {{-- Page Name --}}

@section('quick-actions')

  <a href="{{ route('patients.index') }}" class="btn  btn-outline-secondary btn-sm">
    <i class="fas fa-arrow-left"></i>  Voltar
  </a>

  <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-outline-success btn-sm">
    <i class="fas fa-pencil-alt"></i>  Editar
  </a> 

@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">

          <h3 class="profile-username text-center"> {{ $patient->user->name }}</h3>

            <p class="text-muted text-center">{{ $patient->user->social_name }}</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Email:</b> <a class="">{{ $patient->user->email }}</a>
              </li>
              <li class="list-group-item">
              <b>Data de nascimento:</b> <a class="">{{ $patient->user->birth_date->format('d/m/Y') }}</a>
              </li>
              <li class="list-group-item">
                <b>CPF:</b> <a class="">{{ $patient->user->cpf }}</a>
              </li>
              <li class="list-group-item">
                <b>RG:</b> <a class="">{{ $patient->user->rg }}</a>
              </li>
              <li class="list-group-item">
                <b>Sexo:</b> <a class="">{{ $patient->user->gender->name }}</a>
              </li>
              <li class="list-group-item">
                <b>Nome da mãe:</b> <a class="">{{ $patient->mother_name }}</a>
              </li>
              <li class="list-group-item">
                <b>Nome do pai:</b> <a class="">{{ $patient->father_name }}</a>
              </li>
              <li class="list-group-item">
                <b>Nome do responsável:</b> <a class="">{{ $patient->responsible_name }}</a>
              </li>
              <li class="list-group-item">
                <b>Telefone do responsável:</b> <a class="">{{ $patient->responsible_phone }}</a>
              </li>
              <li class="list-group-item">
                <b>Observações:</b> <a class="">{{ $patient->observation }}</a>
              </li>
                
            </ul>

          </div>
          <!-- /.card-body -->
        </div>
        
      </div>

      <div class="col-md-9" >
        <div class="card">
        
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#next-attendences" data-toggle="tab">Próximas Consultas</a></li>
              <li class="nav-item"><a class="nav-link" href="#attendences" data-toggle="tab">Consultas passadas</a></li>
              
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">

              <!-- Proximas consultas -->
              <div class="tab-pane active" id="next-attendences">
                @foreach($patient->attendances->sortBy('status') as $attendance)
                  @if($attendance->schedule->start_date >= now())
                    <div class="card bg-light">
                      <div class="card-header border-bottom-0">
                        <strong><i class="fas fa-clock mr-1"></i>
                          {{ $attendance->schedule->start_date->format('d/m/Y H:i') }}
                        </strong>
                        <span class="badge badge-{{ $attendance->status->name }} uppercase right">
                          @if($attendance->status->id == 1) agendado @endif
                          @if($attendance->status->id == 2) confirmado @endif
                          @if($attendance->status->id == 3) paciente ausente @endif
                          @if($attendance->status->id == 4) cancelado @endif
                          @if($attendance->status->id == 5) finalizado @endif
                        </span>
                      </div>
                      <br>
                      <div class="card-body pt-0">
                        <div class="row">
                          <div class="col-7">
                            <h2 class="lead"><b>{{ $attendance->doctor->treatment }} {{ $attendance->doctor->user->name }}</b></h2>
                            <p class="text-muted text-sm">
                              <strong> Especialista em: </strong>
                              @foreach($attendance->doctor->specialties as $specialty)
                                {{ $specialty->name }} @if(!$loop->last) / @endif
                              @endforeach
                            </p>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
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
                        
                        <div class="text-right">

                          @if($attendance->status->id == 1) 
                          <a href="#" class="btn btn-sm bg-danger">
                            <i class="fas fa-times"></i>
                            Cancelar
                          </a>  

                          <a href="#" class="btn btn-sm bg-teal">
                            <i class="fas fa-check"></i>
                            Confirmar 
                          </a>  
                          @endif
                     
                        </div>
                      </div>
                 
                    </div>
                  @endif
                @endforeach
              </div>
          
              
              <!-- Consultas passadas -->
              <div class="tab-pane" id="attendences">
                @foreach($patient->attendances->sortBy('status') as $attendance)
                  @if($attendance->schedule->start_date < now())
                    <div class="card bg-light">
                      <div class="card-header border-bottom-0">
                        <strong><i class="fas fa-clock mr-1"></i>
                          {{ $attendance->schedule->start_date->format('d/m/Y H:i') }}
                        </strong>
                        <span class="badge badge-{{ $attendance->status->name }} uppercase right">
                          @if($attendance->status->id == 1) agendado @endif
                          @if($attendance->status->id == 2) confirmado @endif
                          @if($attendance->status->id == 3) paciente ausente @endif
                          @if($attendance->status->id == 4) cancelado @endif
                          @if($attendance->status->id == 5) finalizado @endif
                        </span>
                      </div>
                      <br>
                      <div class="card-body pt-0">
                        <div class="row">
                          <div class="col-7">
                            <h2 class="lead"><b>{{ $attendance->doctor->treatment }} {{ $attendance->doctor->user->name }}</b></h2>
                            <p class="text-muted text-sm">
                              <strong> Especialista em: </strong>
                              @foreach($attendance->doctor->specialties as $specialty)
                                {{ $specialty->name }} @if(!$loop->last) / @endif
                              @endforeach
                            </p>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                              <li class="small"><span class="fa-li"><i class="fas fa-lg fa-at"></i></span> {{ $attendance->doctor->user->email }}</li>
                              @if($attendance->doctor->user->phone)
                              <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> {{ $attendance->doctor->user->phone }}</li>
                              @endif
                            </ul>
                          </div>
                        </div>

                      </div>
                 
                    </div>
                  @endif
                @endforeach
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>  

@endsection

@section('javascript')

<script></script>

@endsection