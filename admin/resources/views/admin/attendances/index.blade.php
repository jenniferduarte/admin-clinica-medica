@extends('admin.layout.template')

@section('page-name') Agendamentos @endsection {{-- Page Name  --}}

@section('quick-actions')
<a href="{{ route('attendances.create') }}" class="btn btn-block btn-outline-success btn-sm">
    <i class="nav-icon fas fa-user-md"></i>  Marcar consulta
</a>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card card-primary">
    <div class="card-body">

      <div id='calendar'></div>

    </div>
</div>
   
@endsection

