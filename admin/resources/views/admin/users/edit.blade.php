@extends('admin.layout.template')

@section('page-name') Editar meus dados › {{ $user->name }} @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">

    <!-- form start -->
    <form role="form"method="POST" action="{{ route('users.update', $user->id) }}" id="edit-form">
        @method('PUT')
        @csrf

        <div class="card-body">

            <div class="row">

                <!-- Inclui o form de edição do usuário -->
                @include('admin.users._inputs-edit', ['user' => $user])

            </div>
        </div>
    </form>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary" form="edit-form">Salvar</button>

        <a href="#" class="btn btn-secondary float-right goback">Voltar</a>
    </div>

</div>


@endsection

@section('javascript')

<script></script>

@endsection
