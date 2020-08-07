@extends('admin.layout.template')

@section('page-name') Edit Product › {{ $product->name }} @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">
   
    <!-- form start -->
    <form role="form" method="POST" action="{{ route('products.update', $product) }}" id="edit-product-form" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        @if ($errors->any())
        {{ $errors }}
        @endif

        <div class="card-body">

            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $input => $message)
                <li class="text-danger">{{ $message }}</li>
                @endforeach
            </ul>
            @endif

            <div class="row">
               <div class="col-md-6">
                    <label for="name">Product Name*</label>
                    <input type="text" class="form-control" name="name" id="name"  required
                        value="{{ old('name', $product->name) }}">
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label> Categories</label>

                        <select class="select2 form-control select2-hidden-accessible" name="categories[]" style="width: 100%;" multiple="multiple">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @foreach($product->categories as $productcategory)
                                @if($productcategory->id == $category->id) {{ 'selected'}} @endif
                                @endforeach
                                >
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="2" placeholder="Description..." id="description">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="price">Prices</label>
                    <table id="price-table" class="table table-valign-middle">
                        <thead>
                            <tr>
                                <th>Quantity</th>
                                <th>Value</th>
                                <th>Promotional value</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @include('admin.products._price-default')

                            @if($product->prices) 
                            @foreach($product->prices as $price)
                            <tr>
                                <td>
                                    <input type="number" class="form-control" name="prices[quantity][]" value="{{ $price->quantity }}">
                                </td>
                                <td>
                                    <input type="text" class="form-control money" name="prices[value][]" value="{{ $price->value }}">
                                </td>
                                <td>
                                    <input type="text" class="form-control money" name="prices[promotional_value][]" value="{{ $price->promotional_value }}">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-flat clear-input-price"><i class="fas fa-times"></i></button>
                                </td>
                            </tr>
                            
                            @endforeach
                            @endif
                       
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" accept="image/*" name="images[]" multiple>
                            <label class="custom-file-label d-inline-block text-truncate w-100" for="image">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="image">Mockup</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="mockup" accept="image/*" name="mockup">
                            <label class="custom-file-label d-inline-block text-truncate w-100" for="mockup">Choose mockup</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5>Uploaded Images</h5>
                    <div class="card card-primary">
                        <div class="card-body uploaded-files">
                            <div class="row">             
                                @if($product->files)
                                @foreach($product->files as $file)
                                    <div class="col-sm-2">
                                        <div class="card-tools">
                                            @if($file->type)
                                            <span data-toggle="tooltip" title="{{ $file->type }}" class="badge bg-info" data-id="{{$file->id}}">{{ $file->type }}</span>
                                            @endif

                                            <span data-toggle="tooltip" title="Delete" class="badge bg-danger btn-delete-file" data-id="{{$file->id}}">
                                                <i class="fas fa-trash-alt" data-id="{{$file->id}}"></i>
                                            </span>
                                        </div>
                                        <a href="{{ $file->url }}" data-toggle="lightbox" data-title="{{ $file->original_name }}" data-gallery="gallery">
                                            <img src="{{ $file->url }}" class="img-fluid mb-2" alt="{{ $file->original_name }}">
                                        </a>
                                    </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="file_deleted" name="file_deleted">
                </div>
            </div>

            <div class="form-group">
                <label for="name">Active</label> <br>
                <div class="bootstrap-switch">
                    <div class="bootstrap-switch-container">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" data-bootstrap-switch="" data-off-color="danger" data-on-color="success" id="active" value="1" 
                            {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                        >
                    </div>
                </div>
            </div>

        </div>

        <div class="card-footer">
            </form>
            {{-- <form id="deleteForm" action="{{ route('products.destroy', $product->id ) }}" method="post" style="display: inline-block;">
                @method('delete') @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form> --}}
             <button type="submit" class="btn btn-success" form="edit-product-form">Submit</button>
        </div>

    </form>
</div>

@endsection

