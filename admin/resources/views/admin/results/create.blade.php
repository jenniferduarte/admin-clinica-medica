@extends('admin.layout.template')

@section('page-name') Novo resultado de exame @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">

    <!-- form start -->
    <form role="form" method="post" action="{{ route('results.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="file-input">Arquivo* <small>(pdf com no máximo 2MB)</small></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input  @error('file') is-invalid  @enderror"
                                    id="file-input" name="file" accept="application/pdf">
                                <label class="custom-file-label" for="file-input">Escolher arquivo</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Enviar</span>
                            </div>
                        </div>
                        @error('file') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

               <!-- Médico -->
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="doctor">Médico solicitante*</label>
                        <select class="select2 form-control select2-hidden-accessible @error('doctor_id') is-invalid @enderror"
                            name="doctor_id" style="width: 100%;">
                            <option value=""></option>
                            @foreach($doctors as $doctor)
                                <option value="{{$doctor->id}}"> {{ $doctor->user->name }} ({{$doctor->user->email}})</option>
                            @endforeach
                        </select>

                        @error('doctor_id') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Paciente -->
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="patient">Paciente*</label>
                        <select class="select2 form-control select2-hidden-accessible @error('patient_id') is-invalid @enderror" name="patient_id" style="width: 100%;">
                            <option value=""></option>
                            @foreach($patients as $patient)
                                <option value="{{$patient->id}}"> {{ $patient->user->name }} ({{$patient->user->email}})</option>
                            @endforeach
                        </select>

                        @error('patient_id') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                @can('isAdmin')
                <!-- Laboratório -->
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="laboratory">Laboratório*</label>
                        <select class="select2 form-control select2-hidden-accessible
                            @error('laboratory_id') is-invalid  @enderror" name="laboratory_id" style="width: 100%;">
                            <option value=""></option>
                            @foreach($laboratories as $laboratory)
                                <option value="{{$laboratory->id}}"> {{ $laboratory->name }} </option>
                            @endforeach
                        </select>

                        @error('laboratory_id') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>
                @else
                <input type="hidden" name="laboratory_id" value="{{ Auth::user()->laboratory->id ?? $result->laboratory->id}}"/>
                @endcan


                @if(Auth::user()->role->id == Role::LABORATORY)

                @endif

                @can('isDoctor')
                <!-- Mostrar ao paciente -->
                <div class="col-md-2 col-sm-12 mb-4">
                    <label for="show_to_patient">Mostrar ao paciente</label> <br>
                    <div class="bootstrap-switch">
                        <div class="bootstrap-switch-container">
                            <input type="hidden" name="show_to_patient" value="0">
                            <input type="checkbox" name="show_to_patient" data-bootstrap-switch=""
                                data-on-text="Sim" data-off-text="Não"
                                data-off-color="danger" data-on-color="success" id="show_to_patient" value="1"
                                {{ old('show_to_patient') ? 'checked' : '' }}
                            >
                            @error('show_to_patient') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
                @else
                <input type="hidden" name="show_to_patient" value="0"/>
                @endcan

            </div>
        </div>

        <div class="card-footer">
            <div class="float-right">
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a href="#" class="btn btn-secondary  goback">Voltar</a>
            </div>
        </div>
    </form>
</div>


@endsection

@section('javascript')

<script>



</script>

@endsection
