@extends('admin.layout.template')

@section('page-name') Editar Laboratório › {{ $laboratory->name }} @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">

    <!-- form start -->
    <form role="form" method="POST" action="{{ route('laboratories.update', $laboratory) }}" id="edit-form">
        @method('PUT')
        @csrf

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="name">Nome*</label>
                        <input type="text"
                            class="form-control @error('name') is-invalid  @enderror"
                            name="name"
                            id="name"
                            placeholder="Digite o nome"
                            value="{{ old('name', $laboratory->name) }}">

                            @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email"
                            class="form-control @error('email') is-invalid  @enderror"
                            name="email"
                            id="email"
                            placeholder="Digite o email"
                            value="{{ old('email', $laboratory->email) }}">

                        @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="phone">Telefone</label>
                        <input type="tel"
                            class="form-control phone_with_ddd @error('phone') is-invalid  @enderror"
                            name="phone"
                            id="phone"
                            placeholder="Digite o telefone"
                            value="{{ old('phone', $laboratory->phone) }}">

                        @error('phone') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="cnpj">CNPJ</label>
                        <input type="tel"
                            class="form-control cnpj @error('cnpj') is-invalid  @enderror"
                            name="cnpj"
                            id="cnpj"
                            placeholder="Digite o CNPJ"
                            value="{{ old('cnpj', $laboratory->cnpj) }}">

                        @error('cnpj') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Usuário responsável -->
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="user">Usuário responsável</label>
                        <select class="select2 form-control select2-hidden-accessible"
                            name="user_id" style="width: 100%;">
                            @foreach($users as $user)
                                <option value="{{$user->id}}"
                                    @if($laboratory->user_id == $user->id) {{ 'selected '}} @endif>
                                    {{ $user->name }} ( {{ $user->email}} )
                                </option>
                            @endforeach
                        </select>
                        @error('user') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

            </div>
        </div>

        <div class="card-footer">
        </form>

            <form id="deleteForm" action="{{ route('laboratories.destroy', $laboratory->id ) }}" method="post">
                @method('delete') @csrf
                <button type="submit" data-id="{{ $laboratory->id }}" class="text-danger btn btn-delete">Deletar</button>
            </form>

            <div class="float-right">
                <button type="submit" class="btn btn-success" form="edit-form">Salvar</button>
                <a href="#" class="btn btn-secondary goback">Voltar</a>
            </div>

        </div>

    </form>
</div>

@endsection
