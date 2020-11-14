@extends('admin.layout.template')

@section('page-name') Novo medicamento @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">

    <!-- form start -->
    <form role="form" method="post" action="{{ route('medicaments.store') }}">
        @csrf

        <div class="card-body">

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="generic-name">Nome genérico*</label>
                        <input type="text"
                            class="form-control @error('generic_name') is-invalid  @enderror"
                            name="generic_name" id="generic-name"
                            placeholder="Digite o nome genérico"
                            value="{{ old('generic_name') }}">

                        @error('generic_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="factory-name">Nome de fábrica*</label>
                        <input type="text"
                            class="form-control @error('factory_name') is-invalid  @enderror"
                            name="factory_name" id="factory-name"
                            placeholder="Digite o nome de fábrica"
                            value="{{ old('factory_name') }}">

                        @error('factory_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="manufacturer">Fabricante</label>
                        <input type="text"
                            class="form-control  @error('manufacturer') is-invalid  @enderror"
                            name="manufacturer" id="manufacturer"
                            placeholder="Digite o fabricante"
                            value="{{ old('manufacturer') }}">

                        @error('manufacturer')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="#" class="btn btn-secondary float-right goback">Voltar</a>
        </div>
    </form>
</div>


@endsection

@section('javascript')

<script>



</script>

@endsection
