@extends('admin.layout.template')

@section('page-name') Edit Category › {{ $category->name }} @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">
   
    <!-- form start -->
    <form role="form" method="POST" action="{{ route('category.update', $category) }}" id="edit-form">
        @method('PUT')
        @csrf

        @if ($errors->any())
        {{ $errors }}
        @endif

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" name="name" id="name" 
                            value="{{ old('name', $category->name) }}">
                    </div>
                </div>

                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label>Color</label>
                        <select class="color-choose form-control select2-hidden-accessible" name="color" style="width: 100%;">
                            @foreach($colors as $color)
                            <option data-code={{ $color->color }}  value="{{$color->id}}" 
                                @if($category->color_id && $category->color_id == $color->id) {{'selected'}} @endif>
                                {{ $color->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="name">Active</label> <br>
                        <div class="bootstrap-switch">
                            <div class="bootstrap-switch-container">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active"  data-bootstrap-switch="" 
                                    data-off-color="danger" data-on-color="success" id="active" value="1"
                                    {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                                    >
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card-footer">
            </form>
            {{-- <form id="deleteForm" action="{{ route('colors.destroy', $color->id ) }}" method="post" style="display: inline-block;">
                @method('delete') @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form> --}}
             <button type="submit" class="btn btn-success" form="edit-form">Submit</button>
        </div>

    </form>
</div>

@endsection
