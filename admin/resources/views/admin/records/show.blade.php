@extends('admin.layout.template')

@section('page-name') Ver Registro › #{{ $record->id}}  @endsection {{-- Page Name --}}

@section('quick-actions')

@endsection

@section('content')

<div class="row">
  <div class="col-md-12">

    <div class="card card-primary">

        <div class="card-header">
          <h3 class="card-title">Consulta realizada dia {{ $record->created_at->format('d/m/Y') }}</h3>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Médico:</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $record->doctor->treatment }} {{ $record->doctor->user->name}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Paciente:</span>
                      <span class="info-box-number text-center text-muted mb-0"> {{ $record->history->patient->user->name }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Expectativa de retorno:</span>
                      <span class="info-box-number text-center text-muted mb-0">
                        {{ Carbon\Carbon::parse($record->expected_return)->format('d/m/Y') ?? '--' }}
                        <span>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-6">
                    <div class="text-muted">
                        <p class="text-sm"><b>Anamnese</b>
                            <span class="d-block">{{ $record->anamnesis  ?? '--' }}</span>
                        </p>

                        <p class="text-sm"><b>Histórico familiar</b>
                            <span class="d-block"> {{ $record->family_history ?? '--' }}</span>
                        </p>

                        <p class="text-sm"><b>Plano de tratamento</b>
                            <span class="d-block"> {{ $record->treatment_plan ?? '--'  }}</span>
                        </p>

                        <p class="text-sm"><b>Conclusão do diagnóstico</b>
                            <span class="d-block"> {{ $record->diagnostic_conclusion ?? '--' }}</span>
                        </p>

                        <p class="text-sm"><b>Alergias</b>
                            <span class="d-block"> {{ $record->allergy ?? '--' }}</span>
                        </p>

                        <p class="text-sm"><b>Fumante?</b>
                            <span class="d-block"> {{ $record->smoker ? 'Sim' : 'Não' }}</span>
                        </p>

                        <p class="text-sm"><b>Usuário de drogas?</b>
                            <span class="d-block"> {{ $record->drug_user ? 'Sim' : 'Não' }}</span>
                        </p>

                        <p class="text-sm"><b>Hipertenso?</b>
                            <span class="d-block"> {{ $record->hypertension ? 'Sim' : 'Não' }}</span>
                        </p>

                        <p class="text-sm"><b>Diabetes?</b>
                            <span class="d-block"> {{ $record->diabetes ? 'Sim' : 'Não' }}</span>
                        </p>

                    </div>
                </div>

                <div class="col-6">
                    <div class="text-muted">
                        <p class="text-sm"><b>Peso</b>
                        <span class="d-block"><span class="weight">{{ $record->weight ?? '--' }}</span> kg</span>
                        </p>

                        <p class="text-sm"><b>Altura</b>
                        <span class="d-block">{{ $record->height ?? '--' }}cm</span>
                        </p>

                        <p class="text-sm"><b>Frequência Cardíaca</b>
                        <span class="d-block">{{ $record->heart_rate ?? '--' }} RPM</span>
                        </p>

                        <p class="text-sm"><b>Pressão sistólica</b>
                        <span class="d-block">{{ $record->systolic_bp ?? '--' }}</span>
                        </p>

                        <p class="text-sm"><b>Pressão diastólica</b>
                        <span class="d-block">{{ $record->diastolic_bp ?? '--' }} </span>
                        </p>

                        <p class="text-sm"><b>Temperatura</b>
                        <span class="d-block">{{ $record->temperature ?? '--' }} °C</span>
                        </p>

                        <p class="text-sm"><b>Doenças crônicas</b>
                            <span class="d-block"> {{ $record->chronic_diseases ?? '--' }}</span>
                        </p>

                    </div>

                </div>

            </div>
        </div>


        <div class="text-muted col-12 col-md-12 col-lg-4 order-1 order-md-2">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Prescrição de Exames</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($record->prescriptions as $prescription)
                        @foreach($prescription->exams as $exam)
                        <tr><td>
                            {{ $exam->name }}
                        </td></tr>
                        @endforeach
                    @endforeach

                </tbody>
            </table>

            <br><br>

            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>Prescrição de Medicamentos</th>
                        <th>Posologia</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($record->prescriptions as $prescription)
                        @foreach($prescription->medicaments as $medicament)
                        <tr>
                            <td>{{ $medicament->factory_name }} ({{$medicament->generic_name}})</td>
                            <td>{{ $medicament->pivot->dosage }}</td>
                        </tr>
                        @endforeach
                    @endforeach

                </tbody>
            </table>
        </div>

          </div>

        <!-- /.card-body -->
    </div>

</div>

@endsection

@section('javascript')

<script></script>

@endsection
