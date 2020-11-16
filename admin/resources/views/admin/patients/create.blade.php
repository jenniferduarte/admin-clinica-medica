@extends('admin.layout.template')

@section('page-name') Novo Paciente  @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">

    <!-- form start -->
    <form role="form" method="post" action="{{ route('patients.store') }}">
        @csrf

        <div class="card-body">

            <div class="row">

                <!-- Inclui o form de cadastro de usuários -->
                @include('admin.users._inputs-create')

                <!-- Social Name -->
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="social-name">Nome social</label>
                        <input type="text"
                            class="form-control @error('social_name') is-invalid  @enderror"
                            name="social_name" id="social-name"
                            placeholder="Digite o nome social"
                            value="{{ old('social_name') }}">

                        @error('social_name') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Mother's Name -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="mother-name">Nome da mãe*</label>
                        <input type="text"
                            class="form-control  @error('mother_name') is-invalid  @enderror"
                            name="mother_name" id="mother-name"
                            placeholder="Digite o nome da mãe"
                            value="{{ old('mother_name') }}">

                        @error('mother_name') <p class="text-danger">{{ $errors->first('mother_name') }}</p> @enderror
                    </div>
                </div>

                <!-- Father's Name -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="father-name">Nome do pai</label>
                        <input type="text"
                            class="form-control  @error('father-name') is-invalid  @enderror"
                            name="father_name" id="father-name"
                            placeholder="Digite o nome do pai"
                            value="{{ old('father_name') }}">

                        @error('father-name') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Responsible Name -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="responsible-name">Nome do responsável</label>
                        <input type="text"
                            class="form-control  @error('responsible_name') is-invalid  @enderror"
                            name="responsible_name" id="responsible-name"
                            placeholder="Digite o nome do responsável"
                            value="{{ old('responsible_name') }}">

                        @error('responsible_name') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Responsible Phone -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="responsible-phone">Telefone do responsável</label>
                        <input type="text"
                            class="form-control phone_with_ddd @error('responsible_phone') is-invalid  @enderror"
                            name="responsible_phone" id="responsible-phone"
                            placeholder="Digite o telefone do responsável"
                            value="{{ old('responsible_phone') }}">

                        @error('responsible_phone') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Observation -->
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="observation">Observação</label>
                        <input type="text"
                            class="form-control  @error('observation') is-invalid  @enderror"
                            name="observation" id="observation"
                            placeholder="Digite a observação"
                            value="{{ old('observation') }}">

                        @error('observation') <p class="text-danger">{{$message }}</p> @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="#" class="btn btn-secondary goback">Voltar</a>
            </div>
        </div>
    </form>
</div>


@endsection

@section('javascript')

<script></script>

@endsection
