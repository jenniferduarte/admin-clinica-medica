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
                <p class="login-box-msg">Você esqueceu sua senha? Aqui você pode facilmente recuperar uma nova senha.</p>

                @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
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
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block"> Enviar link de redefinição de senha </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1 text-center">
                    <a href="{{ route('login') }}">Voltar para o login</a>
                </p>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

</body>

@endsection
