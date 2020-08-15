@extends('admin.layout.template')

@section('page-name') Editar médico › {{ $doctor->user->name }} @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">
   
    <!-- form start -->
    <form role="form"method="POST" action="{{ route('doctors.update', $doctor->id) }}" id="edit-form">
        @method('PUT')
        @csrf
      
        <div class="card-body">

            <div class="row"> 
                
                <!-- Inclui o form de edição do usuário -->
                @include('admin.users._inputs-edit', ['data' => $doctor])

                 <!-- CRM -->
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="social-name">CRM</label>
                        <input type="text" 
                            class="form-control @error('crm') is-invalid  @enderror" 
                            name="crm" id="social-name" 
                            placeholder="Digite o CRM" 
                            value="{{ old('crm', $doctor->crm) }}">

                        @error('crm') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Especialidade -->
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="gender">Especialidade</label>
                        <select class="select2 form-control select2-hidden-accessible" 
                            name="specialties[]" style="width: 100%;" multiple>
                            @foreach($specialties as $specialty)
                                <option value="{{$specialty->id}}" 
                                    @foreach($doctor->specialties as $doctorSpecialty) 
                                        @if($doctorSpecialty->id == $specialty->id) {{ 'selected '}} @endif 
                                    @endforeach> 
                                    {{ $specialty->name }} 
                                </option>
                            @endforeach
                        </select>

                        @error('specialty') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>

            </div>
        </div>
    </form>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary" form="edit-form">Salvar</button>
        <form id="deleteForm" action="{{ route('doctors.destroy', $doctor->id ) }}" method="post">
            @method('delete') @csrf
            <button type="submit" data-id="{{ $doctor->id }}" class="text-danger btn btn-delete">Deletar</button>
        </form>
        <a href="{{ route('doctors.index') }}" class="btn btn-secondary float-right">Voltar</a>
    </div>
    
</div>


@endsection

@section('javascript')

<script></script>

@endsection