@extends('admin.layout.template')

@section('page-name') Ver Prescrição  › {{ $prescription->id }} @endsection {{-- Page Name --}}

@section('quick-actions')

  <a href="#" class="btn  btn-outline-secondary btn-sm goback">
    <i class="fas fa-arrow-left"></i>  Voltar
  </a>

@endsection

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
        <div class="col-12">
            <h4>
            <i class="fas fa-globe"></i> {{ env('APP_NAME', 'SGCM') }} Inc.
            <small class="float-right">Data: {{ $prescription->created_at->format('m/d/Y H:i:s') }}</small>
            </h4>
        </div>
        <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            Médico solicitante

            <strong>{{ $prescription->record->doctor->treatment . ' ' . $prescription->record->doctor->user->name }}</strong><br>
            @foreach($prescription->record->doctor->specialties as $specialty) {{ $specialty->name }} @if(!$loop->last)|@endif @endforeach<br>
            Email: {{ $prescription->record->doctor->user->email  }}<br>

        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            Para
            <strong>{{ $prescription->record->history->patient->user->name }}</strong><br>
            Email: {{ $prescription->record->history->patient->user->email }}<br>
            Telefone: {{ $prescription->record->history->patient->user->phone ?? ' ' }}<br>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Prescrição #{{ $prescription->id }}</b><br>
            <br>
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
        <br><br>
        <!-- Table row -->
        <div class="row">
        <div class="col-12 table-responsive">

            @if($prescription->type == 'exam')
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Exame</th>
                    <th>Descrição</th>
                </tr>

                </thead>
                <tbody>
                    @foreach($prescription->exams as $exam)
                    <tr>
                        <td>{{ $loop->index + 1}} </td>
                        <td>{{ $exam->name }} </td>
                        <td>{{ $exam->description ?? '----' }} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            @if($prescription->type == 'medicament')
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Medicamento</th>
                    <th>Posologia</th>
                </tr>

                </thead>
                <tbody>
                    @foreach($prescription->medicaments as $medicament)

                    <tr>
                        <td>{{ $loop->index + 1}} </td>
                        <td>{{ $medicament->generic_name }} ({{ $medicament->factory_name }})</td>
                        <td>{{ $medicament->pivot->dosage }} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
         @endif
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->

    </div>
  </div>
</div>

@endsection
