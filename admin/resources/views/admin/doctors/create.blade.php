@extends('admin.layout.template')

@section('page-name') Novo médico  @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">
   
    <!-- form start -->
    <form role="form" method="post" action="{{ route('doctors.store') }}">
        @csrf
      
        <div class="card-body">

            <div class="row"> 
                @include('admin.users._inputs-create')

                <!-- CRM -->
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="crm">CRM</label>
                        <input type="text" 
                            class="form-control @error('crm') is-invalid  @enderror" 
                            name="crm" id="crm" 
                            placeholder="Digite o CRM" 
                            value="{{ old('crm') }}">

                        @error('crm') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>
                
                <!-- Especialidade -->
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="gender">Especialidade</label>
                        <select class="select2 form-control select2-hidden-accessible" name="specialties[]" style="width: 100%;" multiple>
                            @foreach($specialties as $specialty)
                                <option value="{{$specialty->id}}"> {{ $specialty->name }}</option>
                            @endforeach
                        </select>

                        @error('specialty') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="{{ route('doctors.index') }}" class="btn btn-secondary float-right">Voltar</a>
        </div>
    </form>
</div>


@endsection

@section('javascript')

<script></script>

@endsection