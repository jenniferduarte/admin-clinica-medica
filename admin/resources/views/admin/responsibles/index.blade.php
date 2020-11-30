@extends('admin.layout.template')

@section('page-name') Responsáveis (Lab) @endsection {{-- Page Name  --}}

@section('quick-actions')
<a href="{{ route('responsibles.create') }}" class="btn btn-block btn-outline-success btn-sm">
    <i class="nav-icon fas fa-user-clock"></i>  Novo responsável
</a>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Inclui a listagem dos usuários -->
@include('admin.users._index-users', ['users' => $responsibles])

@endsection

