@extends('admin.layout.template')

@section('page-name') Recepcionistas @endsection {{-- Page Name  --}}

@section('quick-actions')

<span class="quick-actions">
    <a href="{{ route('receptionists.create') }}" class="btn btn-block btn-outline-success btn-sm">
        <i class="nav-icon fas fa-user-clock"></i>  Novo recepcionista
    </a>
</span>

@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Inclui a listagem dos usuários -->
@include('admin.users._index-users', ['users' => $receptionists])

@endsection

