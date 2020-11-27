@extends('admin.layout.template')

@section('page-name') Alterar senha › {{ Auth::user()->name }} @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">

    <!-- form start -->
    <form role="form"method="POST" action="{{ route('update-password') }}" id="edit-form">
        @method('PUT')
        @csrf

        <div class="card-body">

            <div class="row">

               <!-- Current Password -->
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="current-password">Senha atual</label>
                        <input type="password"
                            class="form-control @error('current_password') is-invalid  @endif"
                            name="current_password" id="current-password"
                            placeholder="Digite a senha">

                        @error('current_password') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- New Password -->
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="password">Nova Senha*</label>
                        <input type="password"
                            class="form-control @error('password') is-invalid  @endif"
                            name="password" id="password"
                            placeholder="Digite a senha">

                        @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Password confirmation -->
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="password-confirm">Confirmação da nova senha*</label>
                        <input type="password"
                            class="form-control @error('password_confirmation') is-invalid  @enderror"
                            name="password_confirmation" id="password-confirm"
                            placeholder="Digite o senha novamente"
                            autocomplete="new-password">

                        @error('password_confirmation') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

            </div>
        </div>
    </form>

    <div class="card-footer">
        <div class="float-right">
            <button type="submit" class="btn btn-success" form="edit-form">Atualizar</button>
            <a href="#" class="btn btn-secondary goback">Voltar</a>
        </div>
    </div>

</div>


@endsection

@section('javascript')

<script></script>

@endsection
