@extends('admin.layout.template')

@section('page-name') Ver Medicamento › {{ $medicament->generic_name }} @endsection {{-- Page Name --}}

@section('quick-actions')

  <a href="#" class="btn  btn-outline-secondary btn-sm goback">
    <i class="fas fa-arrow-left"></i>  Voltar
  </a>

  <a href="{{ route('medicaments.edit', $medicament->id) }}" class="btn btn-outline-success btn-sm">
    <i class="fas fa-pencil-alt"></i>  Editar
  </a>

@endsection

@section('content')

<div class="row">
  <div class="col-md-6">

    <div class="card card-primary">

          <div class="card-body">
            <strong><i class="fas fa-signature mr-1"></i> Nome genérico</strong>
            <p class="text-muted"> {{ $medicament->generic_name }}</p>

            <hr>

            <strong><i class="fas fa-file-signature mr-1"></i> Nome de fábrica</strong>
            <p class="text-muted"> {{ $medicament->factory_name }} </p>

            <hr>

            <strong><i class="fas fa-building mr-1"></i> Fabricante </strong>
            <p class="text-muted">{{ $medicament->manufacturer }}</p>

          </div>
        </div>
  </div>
</div>

@endsection

@section('javascript')

<script></script>

@endsection
