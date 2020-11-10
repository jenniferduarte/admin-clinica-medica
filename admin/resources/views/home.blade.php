@extends('admin.layout.template')

@section('page-name') Início @endsection {{-- Page Name --}}

@section('content')

@can('isDoctor')
    <div id="calendarDoctor"></div>
@endcan

{{-- Patient --}}
@can('isPatient')
    @include('home_patient')
@endcan

@endsection

@section('javascript')

@endsection