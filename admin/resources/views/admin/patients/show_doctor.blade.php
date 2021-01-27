@extends('admin.layout.template')

@section('page-name') Ver Paciente › {{ $patient->user->name }} @endsection {{-- Page Name --}}

@section('quick-actions')

  <a href="{{ route('patients.records.create', $patient->id) }}" class="btn  btn-outline-secondary btn-sm">
    <i class="fas fa-bookmark"></i>   Iniciar atendimento
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
              <b>Data de nascimento:</b> <a class="">{{ $patient->user->birth_date ? $patient->user->birth_date->format('d/m/Y') : ''}}</a>
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
        <div class="card height-fixed">

          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#history" data-toggle="tab">Histórico</a></li>
              <!--<li class="nav-item"><a class="nav-link " href="#prescriptions" data-toggle="tab">Prescrições</a></li>
              <li class="nav-item"><a class="nav-link " href="#exams" data-toggle="tab">Exames</a></li> -->
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">

              <!-- Histórico -->
              <div class="tab-pane active" id="history">

                @if($records)
                <!-- The timeline -->
                <div class="timeline timeline-inverse">
                    <!-- Loop dos registros de um histórico -->
                    @foreach($records as $record)
                    <!-- timeline time label -->
                    <div class="time-label">
                        <span class="bg-secondary">
                        {{ $record->created_at->format('d/m/Y') }}
                        </span>
                    </div>

                    <div>
                        <i class="fas fa-calendar-check bg-secondary"></i>

                        <div class="timeline-item">

                        <h3 class="timeline-header">Consulta com<a href="{{ route('doctors.show', $record->doctor->id)}}">
                            {{ $record->doctor->user->name }}</a>
                        </h3>

                        <div class="timeline-body">

                            @if($record->treatment_plan)
                            <strong> Plano de tratamento: </strong>{{ Str::limit($record->treatment_plan, 150) }}
                            <hr>
                            @endif

                            @if($record->diagnostic_conclusion)
                            <strong> Conclusão do diagnóstico: </strong> {{ Str::limit($record->diagnostic_conclusion, 150) }}
                            @endif

                        </div>
                        <div class="timeline-footer">
                            <a href="{{ route('patients.records.show', [$patient->id, $record->id]) }}"
                                class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Ver detalhes
                            </a>
                        </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p> Este paciente ainda não possui registros. </p>
                @endif
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
