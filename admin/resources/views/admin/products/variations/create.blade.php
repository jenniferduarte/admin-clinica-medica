@extends('admin.layout.template')

@section('styles')
<!-- include summernote css -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('page-name'){{ $product->name}} › New Variation @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">
   
    <!-- form start -->
    <form role="form" method="post" action="{{ route('products.variations.store', $product->id) }}" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
        {{ $errors }}
        @endif

        <div class="card-body">
            <div class="form-group">
                <label for="name">Name*</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" 
                    rows="2" placeholder="Description..." id="description"></textarea>
            </div>

            <div class="form-group">
                <label for="template">Template</label>
                <textarea class="summernote" name="template" id="template"></textarea>
            </div>

            <div class="row">
                {{-- Upload de imagem desabilitado --}}
                <div class="col-md-6 col-sm-12" style="display:none;">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" accept="image/*" name="image[]" multiple>

                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Fim upload de imagem desabilitado --}}

                @include('admin.products.variations._snippets')

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="name">Dynamic Fields</label>
                        <select class="select2 form-control select2-hidden-accessible" name="dynamicFields[]" style="width: 100%;" multiple>
                            @foreach($dynamicFields as $field)
                            <option value="{{$field->id}}"> {{ $field->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="name">Available Colors</label>
                        <select class="select2 color-choose form-control select2-hidden-accessible" name="colors[]" style="width: 100%;" multiple>
                            @foreach($colors as $color)
                            <option data-code={{ $color->color }} value="{{$color->id}}"> {{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="name">Active</label> <br>
                <div class="bootstrap-switch">
                    <div class="bootstrap-switch-container">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" checked="" data-bootstrap-switch="" data-off-color="danger"
                            data-on-color="success" name="is_active" id="active" checked value="1">
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

<!-- include summernote js-->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

@endsection
