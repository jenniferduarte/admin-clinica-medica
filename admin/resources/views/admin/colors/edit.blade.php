@extends('admin.layout.template')

@section('page-name') Edit Color › <i class="fas fa-square" style="color:{{$color->color}}"></i> {{ $color->name ?? '' }} @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">
   
    <!-- form start -->
    <form role="form" method="POST" action="{{ route('colors.update', $color) }}" id="edit-form">
        @method('PUT')
        @csrf

        @if ($errors->any())
        {{ $errors }}
        @endif

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="name">Color Name</label>
                        <input type="text" class="form-control" name="name" id="name" 
                            value="{{ old('name', $color->name) }}">
                    </div>
                </div>

                <div class="col-md-2 col-sm-12">
                    <div class="form-group">
                        <label for="color">Color</label>

                        <div class="input-group selectcolor colorpicker-element" data-colorpicker-id="2">
                            <input type="text" class="form-control" id="color" name="color" value="{{old('color', $color->color)}}" required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-square" style="color: {{old('color', $color->color)}}"></i>
                                </span>
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