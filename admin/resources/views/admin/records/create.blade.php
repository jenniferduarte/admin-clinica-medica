@extends('admin.layout.template')

@section('page-name') Adicionar registro › {{ $patient->user->name }} @endsection {{-- Page Name --}}

@section('quick-actions')
<span class="quick-actions"></span>
@endsection

@section('content')

<div class="card card-primary">

    <!-- form start -->
    <form role="form" method="post" action="{{ route('patients.records.store',$patient->id) }}">
        @csrf
        <div class="card-header">
            <h3 class="card-title"><strong>Informações gerais</strong></h3>
        </div>

        <div class="card-body">

            <div class="row">
                <!-- Anamnese -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="anamnese">Anamnese</label>
                        <textarea rows="3"
                            class="form-control @error('anamnese') is-invalid  @enderror"
                            name="anamnese" id="anamnese"
                            placeholder="Digite a anamnese"
                            value="{{ old('anamnese') }}"></textarea>

                        @error('anamnese') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Histórico Familiar -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="family_history">Histórico familiar</label>
                        <textarea rows="3"
                            class="form-control @error('family_history') is-invalid  @enderror"
                            name="family_history" id="family_history"
                            placeholder="Digite o histórico familiar"
                            value="{{ old('family_history') }}"></textarea>

                        @error('family_history') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Peso -->
                <div class="col-md-2 col-sm-12">
                    <label for="weight">Peso</label>
                    <div class="form-group input-group">
                        <input type="tel"
                            class="form-control weight @error('weight') is-invalid  @enderror"
                            name="weight" id="weight"
                            placeholder="Ex. 87,4" maxlength="6"
                            value="{{ old('weight') }}">

                        <div class="input-group-append">
                            <span class="input-group-text"><b>kg</b></span>
                        </div>
                        @error('weight') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Altura -->
                <div class="col-md-2 col-sm-12">
                    <label for="height">Altura</label>
                    <div class="form-group input-group">
                        <input type="numeric"
                            class="form-control @error('height') is-invalid  @enderror"
                            name="height" id="height"
                            placeholder="Ex. 166" maxlength="3"
                            value="{{ old('height') }}">

                        <div class="input-group-append">
                            <span class="input-group-text"><b>cm</b></span>
                        </div>

                        @error('height') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Frequencia Respiratória -->
                <div class="col-md-2 col-sm-12">
                    <label for="respiratory_frequency">Frequência Respiratória</label>
                    <div class="form-group input-group">
                        <input type="numeric"
                            class="form-control @error('respiratory_frequency') is-invalid  @enderror"
                            name="respiratory_frequency" id="respiratory_frequency"
                            placeholder="Ex. 45" maxlength="2"
                            value="{{ old('respiratory_frequency') }}">

                        <div class="input-group-append">
                            <span class="input-group-text"><b>RPM</b></span>
                        </div>

                        @error('respiratory_frequency') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Frequência Cardíaca -->
                <div class="col-md-2 col-sm-12">
                    <label for="heart_rate">Frequência Cardíaca</label>
                    <div class="form-group input-group">
                        <input type="numeric"
                            class="form-control @error('heart_rate') is-invalid  @enderror"
                            name="heart_rate" id="heart_rate"
                            placeholder="Ex. 70" maxlength="3"
                            value="{{ old('heart_rate') }}">

                        <div class="input-group-append">
                            <span class="input-group-text"><b>BPM</b></span>
                        </div>
                        @error('heart_rate') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Pressão sistólica -->
                <div class="col-md-2 col-sm-12">
                    <label for="systolic_bp">Pressão sistólica</label>
                    <div class="form-group">
                        <input type="numeric"
                            class="form-control @error('systolic_bp') is-invalid  @enderror"
                            name="systolic_bp" id="systolic_bp"
                            placeholder="Ex. 120" maxlength="3"
                            value="{{ old('systolic_bp') }}">
                        @error('systolic_bp') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Pressão diastólica -->
                <div class="col-md-2 col-sm-12">
                    <label for="diastolic_bp">Pressão diastólica</label>
                    <div class="form-group">
                        <input type="numeric"
                            class="form-control @error('diastolic_bp') is-invalid  @enderror"
                            name="diastolic_bp" id="diastolic_bp"
                            placeholder="Ex. 80" maxlength="3"
                            value="{{ old('diastolic_bp') }}">
                        @error('diastolic_bp') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Temperatura -->
                <div class="col-md-2 col-sm-12">
                    <label for="temperature">Temperatura</label>
                    <div class="form-group input-group">
                        <input type="text"
                            class="form-control temperature @error('temperature') is-invalid  @enderror"
                            name="temperature" id="temperature"
                            placeholder="Ex. 34,5" maxlength="3"
                            value="{{ old('temperature') }}">

                        <div class="input-group-append">
                            <span class="input-group-text"><b>°C</b></span>
                        </div>
                        @error('temperature') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Alergia -->
                <div class="col-md-4 col-sm-12">
                    <label for="allergy">Alergias</label>
                    <div class="form-group">
                        <input type="text"
                            class="form-control @error('allergy') is-invalid  @enderror"
                            name="allergy" id="allergy"
                            placeholder="Ex. Dipirona"  maxlength="200"
                            value="{{ old('allergy') }}">

                        @error('allergy') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Doenças crônicas -->
                <div class="col-md-6 col-sm-12">
                    <label for="chronic_diseases">Doenças crônicas</label>
                    <div class="form-group">
                        <input type="text"
                            class="form-control @error('chronic_diseases') is-invalid  @enderror"
                            name="chronic_diseases" id="chronic_diseases"
                            placeholder="Ex. asma" maxlength="200"
                            value="{{ old('chronic_diseases') }}">
                        @error('chronic_diseases') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Fumante -->
                <div class="col-md-2 col-sm-12">
                    <label for="smoker">Fumante?</label> <br>
                    <div class="bootstrap-switch">
                        <div class="bootstrap-switch-container">
                            <input type="hidden" name="smoker" value="0">
                            <input type="checkbox" name="smoker" data-bootstrap-switch=""
                                data-on-text="Sim" data-off-text="Não"
                                data-off-color="danger" data-on-color="success" id="smoker" value="1"
                                {{ old('smoker') ? 'checked' : '' }}
                            >
                        </div>
                    </div>
                </div>

                <!-- Usuario de drogas -->
                <div class="col-md-2 col-sm-12">
                    <label for="drug_user">Usuário de drogas?</label> <br>
                    <div class="bootstrap-switch">
                        <div class="bootstrap-switch-container">
                            <input type="hidden" name="drug_user" value="0">
                            <input type="checkbox" name="drug_user" data-bootstrap-switch=""
                                data-on-text="Sim" data-off-text="Não"
                                data-off-color="danger" data-on-color="success" id="drug_user" value="1"
                                {{ old('drug_user') ? 'checked' : '' }}
                            >
                        </div>
                    </div>
                </div>

                <!-- Hipertenso -->
                  <div class="col-md-2 col-sm-12">
                    <label for="hypertension">Hipertenso?</label> <br>
                    <div class="bootstrap-switch">
                        <div class="bootstrap-switch-container">
                            <input type="hidden" name="hypertension" value="0">
                            <input type="checkbox" name="hypertension" data-bootstrap-switch=""
                                data-on-text="Sim" data-off-text="Não"
                                data-off-color="danger" data-on-color="success" id="hypertension" value="1"
                                {{ old('hypertension') ? 'checked' : '' }}
                            >
                        </div>
                    </div>
                </div>

                <!-- Diabetico -->
                <div class="col-md-2 col-sm-12">
                    <label for="diabetes">Diabético?</label> <br>
                    <div class="bootstrap-switch">
                        <div class="bootstrap-switch-container">
                            <input type="hidden" name="diabetes" value="0">
                            <input type="checkbox" name="diabetes" data-bootstrap-switch=""
                                data-on-text="Sim" data-off-text="Não"
                                data-off-color="danger" data-on-color="success" id="diabetes" value="1"
                                {{ old('diabetes') ? 'checked' : '' }}
                            >
                        </div>
                    </div>
                </div>

                <!-- Data -->
                <div class="bootstrap-timepicker col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Expectativa de retorno:</label>
                        <div class="input-group" id="expected_return" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input datepicker
                                @error('expected_return') is-invalid @enderror"
                                data-target="#expected_return" placeholder="Selecione" name="expected_return"
                                autocomplete="false" value="{{ old('expected_return') }}">
                            <div class="input-group-append" data-target="#expected_return" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                            </div>
                        </div>
                        @error('expected_return') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <br><hr><br>
            <div class="row">

                <!-- Plano de tratamento -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="treatment_plan">Plano de tratamento*</label>
                        <textarea rows="3"
                            class="form-control @error('treatment_plan') is-invalid  @enderror"
                            name="treatment_plan" id="treatment_plan"
                            placeholder="Digite o plano de tratamento"
                            value="{{ old('treatment_plan') }}"></textarea>

                        @error('treatment_plan') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Conclusão do diagnóstico -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="diagnostic_conclusion">Conclusão do diagnóstico*</label>
                        <textarea rows="3"
                            class="form-control @error('diagnostic_conclusion') is-invalid  @enderror"
                            name="diagnostic_conclusion" id="diagnostic_conclusion"
                            placeholder="Digite a conclusão do diagnóstico"
                            value="{{ old('diagnostic_conclusion') }}"></textarea>

                        @error('diagnostic_conclusion') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <br><hr><br>
            <h2> Prescrição </h2>
            <br>

            <div class="row">

                <div class="col-md-6 col-sm-12">

                    <!-- Exames -->
                    <div class="form-group">
                        <label for="exams">Exames</label>
                        <select class="select2 form-control select2-hidden-accessible" name="exams[]"
                            style="width: 100%;" multiple>
                            <option></option>
                            @foreach($exams as $exam)
                                <option value="{{$exam->id}}">
                                    {{ $exam->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('exam') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label for="description">Observações Gerais</label>
                        <textarea type="text" class="form-control @error('description') is-invalid  @enderror"
                        name="description" id="description" value="{{ old('description') }}"></textarea>
                    </div> --}}
                </div>

                <div class="col-md-6 col-sm-12">

                    <div id="medicaments-selections">
                        <!-- Medicamentos -->
                        <div class="row medicaments">

                            <!-- Medicamento -->
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="medicaments">Medicamento*</label>
                                    <select class="select2-medicaments form-control select2-hidden-accessible" name="medicaments[]"
                                        style="width: 100%;">
                                        <option></option>
                                        @foreach($medicaments as $medicament)
                                            <option value="{{$medicament->id}}">
                                                {{ $medicament->generic_name }} ({{ $medicament->factory_name }})
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('medicament') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <!-- Posologia -->
                            <div class="col-md-5 col-sm-12">
                                <div class="form-group">
                                    <label for="dosage">Posologia</label>
                                    <input type="text"
                                        class="form-control dosage @error('dosage') is-invalid  @enderror"
                                        name="dosages[]" value="{{ old('dosage') }}">
                                </div>
                            </div>

                            <!-- Remover linha do medicamento-->
                            <div class="btn btn-sm btn-danger remove-medicament "><i class="fas fa-minus"></i></div>

                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a class="clone-medicaments text-secondary">
                            <span class="btn btn-sm btn-secondary"> <i class="fas fa-plus"></i></span>
                            <strong>Inserir outro medicamento</strong>
                        </a>
                    </div>

                </div>



            </div>

        </div>

        <div class="card-footer">
            <div class="float-right">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="#" class="btn btn-secondary goback">Voltar</a>
            </div>
        </div>
    </form>
</div>


@endsection

@section('javascript')

<script>

$(function() {

    //Datepicker
    $('#expected_return').datetimepicker({
        format: 'DD/MM/YYYY',
        minDate: moment(),
    });

});

// TODO: colocar no app.js
$(".clone-medicaments").click(function (e) {
    $('.select2-medicaments').select2("destroy");
    $clone = $('.row.medicaments').first().clone(true);
    $clone.closest('.remove-medicament').removeClass('hide');
    $clone.find('.dosage').val('');
    $('#medicaments-selections').append($clone);
    $('.select2-medicaments').select2({placeholder: "Selecione"});
});

$(".remove-medicament").click(function (e){
    medicaments = $(this).closest('.medicaments');
    medicaments.closest('.select2-medicaments').select2('destroy');
    medicaments.remove();
});

</script>

@endsection
