@extends('admin.layout.app')
@section('page-name') Redefinir senha @endsection
@section('body')

<body class="hold-transition login-page">
    <div class="card">
        <br>
        <div class="login-logo">
            <img src="{{ asset('img/logo.png') }}" width="230px" height="auto">
        </div>
        <!-- /.login-logo -->
        <div class=" login-box">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Redefinição de senha</p>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail"
                                name="email" required autocomplete="email" autofocus  value="{{ $email ?? old('email') }}" readonly>

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Senha"
                            name="password" required autocomplete="new-password" >

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="input-group mb-3">

                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirmação da senha"
                                name="password_confirmation" required autocomplete="new-password">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Redefinir senha
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
