@extends('admin.layout.template')

@section('page-name') New Color @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">
   
    <!-- form start -->
    <form role="form" method="post" action="{{ route('colors.store') }}" id="new-color-form">
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

                <div class="col-md-2 col-sm-12">
                    <div class="form-group">
                        <label for="color">Color</label>

                        <div class="input-group selectcolor colorpicker-element" data-colorpicker-id="2">
                            <input type="text" class="form-control" data-original-title="" title="" id="color" name="color">

                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-square"></i></span>
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

@section('javascript')

<script>

</script>

@endsection
