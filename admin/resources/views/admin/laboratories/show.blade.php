@extends('admin.layout.template')

@section('page-name') Ver Laboratório › {{ $laboratory->name }} @endsection {{-- Page Name --}}

@section('quick-actions')
<span class="quick-actions">
  <a href="#" class="btn  btn-outline-secondary btn-sm goback">
    <i class="fas fa-arrow-left"></i>  Voltar
  </a>

  <a href="{{ route('laboratories.edit', $laboratory->id) }}" class="btn btn-outline-success btn-sm">
    <i class="fas fa-pencil-alt"></i>  Editar
  </a>
</span>
@endsection

@section('content')

<div class="row">
  <div class="col-md-6">

    <div class="card card-primary">

          <div class="card-body">
            <strong><i class="fas fa-signature mr-1"></i> Nome</strong>
            <p class="text-muted"> {{ $laboratory->nome }}</p>

            <hr>

            <strong><i class="fas fa-file-signature mr-1"></i> Email</strong>
            <p class="text-muted"> {{ $laboratory->email }} </p>

            <hr>

            <strong><i class="fas fa-building mr-1"></i> CNPJ </strong>
            <p class="text-muted">{{ $laboratory->cnpj }}</p>

            <hr>

            <strong><i class="fas fa-building mr-1"></i> Telefone </strong>
            <p class="text-muted">{{ $laboratory->phone }}</p>

            <hr>

            <strong><i class="fas fa-building mr-1"></i> Responsável </strong>
            <p class="text-muted">{{ $laboratory->user->name }} - {{ $laboratory->user->email }} </p>

          </div>
        </div>
  </div>
</div>

@endsection

@section('javascript')

<script></script>

@endsection
