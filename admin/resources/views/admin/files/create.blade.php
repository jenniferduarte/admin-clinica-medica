@extends('admin.layout.template')

@section('page-name') New File @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">

    <!-- form start -->
    <form role="form" method="post" action="{{ route('files.store') }}" enctype="multipart/form-data">

        @csrf

        @if ($errors->any())
        {{ $errors }}
        @endif

        <div class="card-body">

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" accept="image/*" name="image">

                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
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

