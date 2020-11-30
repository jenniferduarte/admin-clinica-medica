@extends('admin.layout.app')
@section('page-name') Login @endsection {{-- Page Name  --}}
@section('body')
<body class="login-page">
    <div class="card">

        <div class="login-box">
            <br>
            <div class="login-logo">
            <img src="{{ asset('img/logo.png') }}" width="230px" height="auto">
        </div>
        <!-- /.login-logo -->
        <div class="card-body login-card-body">
            <p class="login-box-msg">Faça login para iniciar sua sessão</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                        name="password" required autocomplete="current-password">

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

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                Lembre-me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Entrar
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                <a href="{{ route('password.request')}}">Esqueci minha senha</a>
            </p>

        </div>
            <!-- /.login-card-body -->
        </div>
    </div>
<!-- /.login-box -->
@endsection
