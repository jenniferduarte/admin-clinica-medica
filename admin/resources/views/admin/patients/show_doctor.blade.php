@extends('admin.layout.template')

@section('page-name') Ver Paciente › {{ $patient->user->name }} @endsection {{-- Page Name --}}

@section('quick-actions')

  <a href="{{ route('patients.records.create', $patient->id) }}" class="btn  btn-outline-secondary btn-sm">
    <i class="fas fa-bookmark"></i>   Adicionar registro
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
              <li class="nav-item"><a class="nav-link active" href="#history" data-toggle="tab">Histórico</a></li>
            
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">

              <!-- Histórico -->
              <div class="tab-pane active" id="history">
             
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