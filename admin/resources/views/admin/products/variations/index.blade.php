@extends('admin.layout.template')

@section('page-name') {{ $product->name }} › Variations @endsection {{-- Page Name  --}}

@section('quick-actions') 
    <a href="{{ route('products.variations.create', $product) }}" class="btn btn-block btn-outline-success btn-sm">New Variation</a> 
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
                @foreach($variations as $variation)
                <tr>
                    <td>{{ $variation->id }} </td>
                    <td>{{ $variation->name }} </td>
                    <td>{{ $variation->description }} </td>
                    <td>{{ $variation->is_active ? 'Yes' : 'No' }} </td>

                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('products.variations.edit', [$product->id, $variation->id]) }}" class="btn btn-secondary ">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            {{-- <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a href="{{ route('products.variations.index', $product->id) }}" class="dropdown-item"> Variations </a>
                                </div>
                            </div> --}}
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
   
@endsection


