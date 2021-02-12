@extends('admin.layout.template')

@section('page-name') Ver Médico › {{ $doctor->user->name }} @endsection {{-- Page Name --}}

@section('quick-actions')
<span class="quick-actions">
  <a href="#" class="btn btn-outline-secondary btn-sm goback">
    <i class="fas fa-arrow-left"></i>  Voltar
  </a>

  <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-outline-success btn-sm">
    <i class="fas fa-pencil-alt"></i>  Editar
  </a>
</span>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">

        @if($doctor->user->gender)
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/doctor-' . $doctor->user->gender->id . '.png') }}"
              alt="Médico profile picture">
          </div>
        @endif

        <h3 class="profile-username text-center"> {{ $doctor->user->name }}</h3>

        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
            <b>Email:</b> <a class="">{{ $doctor->user->email }}</a>
            </li>
            <li class="list-group-item">
            <b>Data de nascimento:</b> <a class="">{{ $doctor->user->birth_date ? $doctor->user->birth_date->format('d/m/Y') : '' }}</a>
            </li>
            <li class="list-group-item">
            <b>CPF:</b> {{ $doctor->user->cpf }}
            </li>
            <li class="list-group-item">
            <b>RG:</b> {{ $doctor->user->rg }}
            </li>
            <li class="list-group-item">
            <b>Sexo:</b> {{ $doctor->user->gender->name ?? ''}}
            </li>
            <li class="list-group-item">
            <b>Especialidade:</b>
                @foreach($doctor->specialties as $specialty)
                {{ $specialty->name}} @if(!$loop->last) | @endif
                @endforeach
            </li>
        </ul>

        </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.card -->
    </div>

    <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>


@endsection

@section('javascript')

<script></script>

@endsection
