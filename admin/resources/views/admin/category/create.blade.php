@extends('admin.layout.template')

@section('page-name') New Category @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">
   
    <!-- form start -->
    <form role="form" method="post" action="{{ route('category.store') }}" id="new-color-form">
        @csrf

        @if ($errors->any())
        {{ $errors }}
        @endif

        <div class="card-body">
            <div class="row"> 
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="name">Color</label>
                        <select class="color-choose form-control select2-hidden-accessible" name="color" style="width: 100%;">
                            @foreach($colors as $color)
                                <option data-code={{ $color->color }} value="{{$color->id}}"> {{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- <div class="custom-control custom-switch">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" class="custom-control-input" name="is_active" id="active" checked value="1">
                    <label class="custom-control-label" for="active">Active</label>
                </div> --}}
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="name">Active</label> <br>
                        <div class="bootstrap-switch">
                            <div class="bootstrap-switch-container">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" checked="" data-bootstrap-switch="" 
                                    data-off-color="danger" data-on-color="success" name="is_active" id="active" checked value="1">
                            </div>
                        </div>
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