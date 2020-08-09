@extends('admin.layout.template')

@section('page-name') Novo medicamento @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">
   
    <!-- form start -->
    <form role="form" method="post" action="{{ route('medicaments.store') }}" id="new-color-form">
        @csrf
      
        <div class="card-body">

            <div class="row"> 
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="generic-name">Nome genérico*</label>
                        <input type="text" 
                            class="form-control @if ($errors->has('generic_name')) is-invalid  @endif" 
                            name="generic_name" id="generic-name" 
                            placeholder="Digite o nome genérico" 
                            value="{{ old('generic_name') }}">

                        @if ($errors->has('generic_name')) <p class="text-danger">{{ $errors->first('generic_name') }}</p> @endif
                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="factory-name">Nome de fábrica*</label>
                        <input type="text" 
                            class="form-control @if ($errors->has('factory_name')) is-invalid  @endif" 
                            name="factory_name" id="factory-name" 
                            placeholder="Digite o nome de fábrica" 
                            value="{{ old('factory_name') }}">

                        @if ($errors->has('factory_name')) <p class="text-danger">{{ $errors->first('factory_name') }}</p> @endif
                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="manufacturer">Fabricante</label>
                        <input type="text" 
                            class="form-control  @if ($errors->has('manufacturer')) is-invalid  @endif" 
                            name="manufacturer" id="manufacturer" 
                            placeholder="Digite o fabricante"
                            value="{{ old('manufacturer') }}">

                        @if ($errors->has('manufacturer')) <p class="text-danger">{{ $errors->first('manufacturer') }}</p> @endif
                    </div>
                </div>

            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>


@endsection

@section('javascript')

<script>



</script>

@endsection
