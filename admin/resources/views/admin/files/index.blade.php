@extends('admin.layout.template')

@section('page-name') Files @endsection {{-- Page Name  --}}

@section('quick-actions')
<a href="{{ route('files.create') }}" class="btn btn-block btn-outline-success btn-sm">New File</a>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card card-primary">
    <div class="card-body">

        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Filename</th>
                    <th>Original</th>
                </tr>
            </thead>

            <tbody>
                @foreach($files as $file)
                <tr>
                    <td>{{ $file->id }} </td>
                    <td>{{ $file->filename }} </td>
                    <td>{{ $file->original_name }} </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
