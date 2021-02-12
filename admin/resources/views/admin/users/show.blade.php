@extends('admin.layout.template')

@section('page-name') Ver Usuário › {{ $user->name }} @endsection {{-- Page Name --}}

@section('quick-actions')

<span class="quick-actions">
  <a href="#" class="btn btn-outline-secondary btn-sm goback">
    <i class="fas fa-arrow-left"></i>  Voltar
  </a>

  <a href="{{ route('users.edit', $user) }}" class="btn btn-outline-success btn-sm">
    <i class="fas fa-pencil-alt"></i>  Editar
  </a>
</span>

@endsection

@section('content')


<div class="row">
    <div class="col-md-3">

    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">

        <div class="text-center">
        </div>

        <h3 class="profile-username text-center"> {{ $user->name }}</h3>

        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
            <b>Email:</b> <a class="">{{ $user->email }}</a>
            </li>
            <li class="list-group-item">
            <b>Data de nascimento:</b> <a class="">{{ $user->birth_date ? $user->birth_date->format('d/m/Y') : '' }}</a>
            </li>
            <li class="list-group-item">
            <b>CPF:</b> {{ $user->cpf }}
            </li>
            <li class="list-group-item">
            <b>RG:</b> {{ $user->rg }}
            </li>
            <li class="list-group-item">
            <b>Sexo:</b> {{ $user->gender->name ?? '--'}}
            </li>
            <li class="list-group-item">
            <b>Telefone:</b> {{ $user->phone ?? '--'}}
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


@endsection

@section('javascript')

<script></script>

@endsection
