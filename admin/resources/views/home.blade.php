@extends('admin.layout.template')

@section('page-name') Dashboard @endsection {{-- Page Name --}}

@section('content')

@can('isDoctor')
    <div id="calendarDoctor"></div>
@endcan

@endsection

@section('javascript')

@endsection