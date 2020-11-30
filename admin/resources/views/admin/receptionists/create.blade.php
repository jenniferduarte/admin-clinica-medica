@extends('admin.layout.template')

@section('page-name') Novo recepcionista  @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">

    <!-- form start -->
    <form role="form" method="post" action="{{ route('receptionists.store') }}">
        @csrf

        <div class="card-body">

            <div class="row">
                @include('admin.users._inputs-create')
            </div>
        </div>

        <div class="card-footer">
            <div class="float-right">
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a href="#" class="btn btn-secondary goback">Voltar</a>
            </div>
        </div>
    </form>
</div>


@endsection

@section('javascript')

<script></script>

@endsection
