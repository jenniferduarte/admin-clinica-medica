@extends('admin.layout.template')

@section('page-name') Laboratórios @endsection {{-- Page Name  --}}

@section('quick-actions')
<a href="{{ route('laboratories.create') }}" class="btn btn-block btn-outline-success btn-sm">
    <i class="nav-icon fas fa-capsules"></i>  Novo Laboratório
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
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Responsável</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($laboratories as $laboratory)
                <tr>
                    <td>{{ $laboratory->id }} </td>
                    <td>{{ $laboratory->name }} </td>
                    <td>{{ $laboratory->email }} </td>
                    <td>{{ $laboratory->user->name }} ({{$laboratory->user->email}}) </td>
                    <td>
                        <a href="{{ route('laboratories.edit', $laboratory->id) }}" class="btn btn-secondary ">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

