@extends('admin.layout.template')

@section('page-name') Edit Variation › {{ $variation->name }} @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">
   
    <!-- form start -->
    <form role="form" method="POST" action="{{ route('products.variations.update', [$product->id, $variation->id]) }}" id="edit-product-form" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        @if ($errors->any())
        {{ $errors }}
        @endif

        <div class="card-body">
            <div class="form-group">
                <label for="name">Variation Name*</label>
                <input type="text" class="form-control" name="name" id="name"  required
                    value="{{ old('name', $variation->name) }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="2" placeholder="Description..." id="description">{{ old('description', $variation->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="template">Template</label>
                <textarea class="summernote" name="template" id="template">{{ old('description', $variation->template) }}</textarea>
            </div>

            @include('admin.products.variations._snippets')

            <div class="form-group">
                <label>Dynamic Fields</label>
                <select class="select2 form-control select2-hidden-accessible" name="dynamicFields[]" style="width: 100%;" multiple>
                    @foreach($dynamicFields as $dynamicField)
                    <option value="{{$dynamicField->id}}" @foreach($variation->dynamicFields as $variationfield)
                        @if($variationfield->id && $variationfield->id == $dynamicField->id) {{ 'selected '}} @endif
                    @endforeach
                    >
                        {{ $dynamicField->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Available Colors</label>
                <select class="color-choose form-control select2-hidden-accessible" name="colors[]" style="width: 100%;" multiple>
                    @foreach($colors as $color)
                    <option data-code={{ $color->color }} value="{{$color->id}}"
                        @foreach($variation->colors as $variationcolor) 
                            @if($variationcolor->id && $variationcolor->id == $color->id) {{ 'selected '}} @endif 
                        @endforeach
                    >
                    {{ $color->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Upload de imagem desabilitado --}}
            <div class="form-group" style="display:none">
                <label for="image">Image</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" accept="image/*" name="image[]" multiple>
                        <label class="custom-file-label d-inline-block text-truncate w-100" for="image">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
            </div>

            <div class="form-group" style="display:none">
                <div class="card card-primary">
                    <div class="card-body uploaded-files">
                        <div class="row">
                            @if($variation->file)
                            @foreach($variation->file as $file)
                            <div class="col-sm-2">
                                <div class="card-tools">
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
            {{-- Fim Upload de imagem desabilitado --}}

            <div class="form-group">
                <label for="name">Active</label> <br>
                <div class="bootstrap-switch">
                    <div class="bootstrap-switch-container">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" data-bootstrap-switch="" data-off-color="danger" data-on-color="success" id="active" value="1" 
                        {{ old('is_active', $variation->is_active) ? 'checked' : '' }}>
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

@section('javascript')
<!-- include summernote js-->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

@endsection
