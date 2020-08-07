@extends('admin.layout.template')

@section('page-name') New Product @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">
   
    <!-- form start -->
    <form role="form" method="post" action="{{ route('products.store') }}" id="new-product-form" enctype="multipart/form-data">

        @csrf

        <div class="card-body">
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $input => $message)
                <li class="text-danger">{{ $message }}</li>
                @endforeach
            </ul>
            @endif

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="name">Product Name*</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" >
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Categories</label>
                        <select class="select2 form-control select2-hidden-accessible" name="categories[]" style="width: 100%;" multiple="multiple">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" class=" ">
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" 
                    rows="2" placeholder="Description..." id="description"></textarea>
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
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="image">Images</label>
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

            <div class="form-group">
                <label for="name">Active</label> <br>
                <div class="bootstrap-switch">
                    <div class="bootstrap-switch-container">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" data-bootstrap-switch="" 
                            data-off-color="danger" data-on-color="success" checked id="active" value="1">
                    </div>
                </div>
            </div>
        
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection

