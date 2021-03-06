@extends('admin.layout.template')

@section('page-name') Início @endsection {{-- Page Name --}}

@section('content')

@can('isAdmin')
    @include('home_admin')
@endcan

{{-- Aqui está sendo usado a verificação por role pois é para aparecer APENAS para pacientes
(não faz muito sentido mostrar esses atalhos para administradores). --}}
@if(Auth::user()->role_id == Role::PATIENT)
    @include('home_patient')
@endif

@endsection
