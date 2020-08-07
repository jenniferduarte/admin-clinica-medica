@extends('admin.layout.template')

@section('page-name') Colors @endsection {{-- Page Name  --}}

@section('quick-actions')
<a href="{{ route('colors.create') }}" class="btn btn-block btn-outline-success btn-sm">New Color</a>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card card-primary">
    <div class="card-body">

        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Color</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($colors as $color)
                <tr>
                    <td>{{ $color->id }} </td>
                    <td>{{ $color->name }} </td>
                    <td>
                        <i class="fas fa-square" style="color:{{$color->color}}"></i> {{ $color->color }} 
                    </td>
                    <td> 
                        <div class="btn-group" role="group">    
                            <a href="{{ route('colors.edit', $color->id) }}" class="btn btn-secondary ">
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

