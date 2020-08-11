@extends('admin.layout.template')

@section('page-name') Novo Paciente  @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">
   
    <!-- form start -->
    <form role="form" method="post" action="{{ route('users.store') }}" id="new-color-form">
        @csrf
      
        <div class="card-body">

            <div class="row"> 
                
                <!-- Name -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="name">Nome*</label>
                        <input type="text" 
                            class="form-control @error('name') is-invalid  @enderror" 
                            name="name" id="name" 
                            placeholder="Digite o nome do paciente" 
                            value="{{ old('name') }}">

                            @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" 
                            class="form-control @error('email')) is-invalid  @enderror" 
                            name="email" id="email" 
                            placeholder="Digite o email" 
                            value="{{ old('email') }}">

                        @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Password -->
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="password">Senha*</label>
                        <input type="password" 
                            class="form-control @error('password') is-invalid  @endif" 
                            name="password" id="password" 
                            placeholder="Digite a senha" 
                            value="{{ old('password') }}">

                        @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Password confirmation -->
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="password-confirm">Confirmação da senha*</label>
                        <input type="password" 
                            class="form-control @error('password') is-invalid  @enderror" 
                            name="password_confirmation" id="password-confirm" 
                            placeholder="Digite o senha novamente" 
                            autocomplete="new-password"
                            value="{{ old('password') }}">

                        @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>
 
                <!-- CPF -->
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" 
                            class="form-control cpf @error('cpf') is-invalid  @enderror" 
                            name="cpf" id="cpf" 
                            placeholder="Digite o cpf"
                            value="{{ old('cpf') }}">

                        @error('cpf') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- RG -->
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="rg">RG</label>
                        <input type="text" 
                            class="form-control @error('rg') is-invalid  @enderror" 
                            name="rg" id="rg" 
                            placeholder="Digite o rg"
                            value="{{ old('rg') }}">

                        @error('rg') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Birth date -->
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="birth-date">Data de nascimento</label>
                        <input type="text" 
                            class="form-control date @error('birth_date') is-invalid  @enderror" 
                            name="birth_date" id="birth-date" 
                            placeholder="Digite a data de nascimento"
                            value="{{ old('birth_date') }}">

                        @error('birth_date') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Phone -->
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="phone">Telefone</label>
                        <input type="text" 
                            class="form-control phone_with_ddd @error('phone') is-invalid  @enderror" 
                            name="phone" id="phone" 
                            placeholder="Digite o telefone"
                            value="{{ old('phone') }}">

                        @error('phone') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Gender -->
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="gender">Sexo</label>
                        <select class="select2 form-control select2-hidden-accessible" name="gender" style="width: 100%;">
                            @foreach($genders as $gender)
                                <option value="{{$gender->id}}"> {{ $gender->name }}</option>
                            @endforeach
                        </select>

                        @error('gender') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

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

                <input type="hidden" name="role" value="{{ Role::PATIENT }}">

            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="{{ route('patients.index') }}" class="btn btn-secondary float-right">Voltar</a>
        </div>
    </form>
</div>


@endsection

@section('javascript')

<script></script>

@endsection