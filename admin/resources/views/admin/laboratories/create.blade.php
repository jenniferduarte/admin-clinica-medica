@extends('admin.layout.template')

@section('page-name') Novo Laboratório @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">

    <!-- form start -->
    <form role="form" method="post" action="{{ route('laboratories.store') }}">
        @csrf

        <div class="card-body">

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="name">Nome do laboratório*</label>
                        <input type="text"
                            class="form-control @error('name') is-invalid  @enderror"
                            name="name" id="name"
                            placeholder="Digite o nome"
                            value="{{ old('name') }}">

                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="email">Email institucional*</label>
                        <input type="email"
                            class="form-control @error('email') is-invalid  @enderror"
                            name="email" id="email"
                            placeholder="Digite o email"
                            value="{{ old('email') }}">

                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="phone">Telefone para contato</label>
                        <input type="tel"
                            class="form-control phone_with_ddd @error('phone') is-invalid  @enderror"
                            name="phone" id="phone"
                            placeholder="Digite o telefone"
                            value="{{ old('phone') }}">

                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                 <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="cnpj">CNPJ</label>
                        <input type="tel"
                            class="form-control cnpj @error('cnpj') is-invalid  @enderror"
                            name="cnpj" id="cnpj"
                            placeholder="Digite o CNPJ"
                            value="{{ old('cnpj') }}">

                        @error('cnpj')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Usuário Responsável -->
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="user">Usuário responsável*</label>
                        <select class="select2 form-control select2-hidden-accessible" name="user_id" style="width: 100%;" required>
                            <option></option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}"> {{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>

                        @error('user') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

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
