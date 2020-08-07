@extends('admin.layout.template')

@section('page-name') Products @endsection {{-- Page Name  --}}

@section('quick-actions')
<a href="{{ route('products.create') }}" class="btn btn-block btn-outline-success btn-sm">New Product</a>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card card-primary">
    <div class="card-body">

        <table id="products" class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Is Active?</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }} </td>
                    <td>{{ $product->name }} </td>
                    <td>{{ $product->description }} </td>
                    <td>{{ $product->is_active ? 'Yes' : 'No'}} </td>
                    
                    <td> 
                        <div class="btn-group" role="group">    
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary ">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a href="{{ route('products.variations.index', $product->id) }}" class="dropdown-item"> Variations </a>
                                </div>
                            </div>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
   
@endsection


