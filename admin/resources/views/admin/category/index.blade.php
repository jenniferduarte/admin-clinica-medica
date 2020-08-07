@extends('admin.layout.template')

@section('page-name') Categories @endsection {{-- Page Name  --}}

@section('quick-actions')
<a href="{{ route('category.create') }}" class="btn btn-block btn-outline-success btn-sm">New Category</a>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card card-primary">
    <div class="card-body">

        <table id="categories" class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Is Active?</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }} </td>
                    <td>{{ $category->name }} </td>
                    <td>{{ $category->is_active ? 'Yes' : 'No' }} </td>

                    <td> 
                        <div class="btn-group" role="group">    
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-secondary ">
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
