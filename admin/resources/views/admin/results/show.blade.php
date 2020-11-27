@extends('admin.layout.template')

@section('page-name') Ver Resultado › {{ $result->id }} @endsection {{-- Page Name --}}

@section('quick-actions')

  <a href="#" class="btn  btn-outline-secondary btn-sm goback">
    <i class="fas fa-arrow-left"></i>  Voltar
  </a>

  <a href="{{ route('results.edit', $result->id) }}" class="btn btn-outline-success btn-sm">
    <i class="fas fa-pencil-alt"></i>  Editar
  </a>

@endsection

@section('content')

<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card card-primary">

            <div class="card-body">
                <strong><i class="fas fa-signature mr-1"></i> Data de Cadastro</strong>
                <p class="text-muted"> {{ $result->created_at->format('d/m/Y') }}</p>

                <hr>

                <strong><i class="fas fa-signature mr-1"></i> Médico</strong>
                <p class="text-muted"> {{ $result->doctor->user->name }}</p>

                <hr>

                <strong><i class="fas fa-file-signature mr-1"></i> Paciente</strong>
                <p class="text-muted"> {{ $result->patient->user->name }} </p>

                <hr>

                <strong><i class="fas fa-building mr-1"></i> Laboratório </strong>
                <p class="text-muted">{{ $result->laboratory->name }}</p>

                <hr>

                <strong><i class="fas fa-building mr-1"></i> Visível ao paciente</strong>
                <p class="text-muted">{{ $result->show_to_patient ? 'Sim' : 'Não' }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <embed src="{{ asset('files/'.$result->file)}}" width="100%" height="800px" type="application/pdf">
    </div>

</div>

@endsection

@section('javascript')

<script></script>

@endsection
