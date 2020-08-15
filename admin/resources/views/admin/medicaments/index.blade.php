@extends('admin.layout.template')

@section('page-name') Medicamentos @endsection {{-- Page Name  --}}

@section('quick-actions')
<a href="{{ route('medicaments.create') }}" class="btn btn-block btn-outline-success btn-sm">
    <i class="nav-icon fas fa-capsules"></i>  Novo Medicamento
</a>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card card-primary">
    <div class="card-body">

        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome genérico</th>
                    <th>Nome de fábrica</th>
                    <th>Fabricante</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($medicaments as $medicament)
                <tr>
                    <td>{{ $medicament->id }} </td>
                    <td>{{ $medicament->generic_name }} </td>
                    <td>{{ $medicament->factory_name }} </td>
                    <td>{{ $medicament->manufacturer }} </td>
                    <td> 
                        <div class="btn-group" role="group">  
                             <a href="{{ route('medicaments.show', $medicament->id) }}" class="btn btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>    
                            <a href="{{ route('medicaments.edit', $medicament->id) }}" class="btn btn-secondary ">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
   
@endsection

