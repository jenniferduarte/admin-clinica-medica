@extends('admin.layout.template')

@section('page-name') Edit Print Shop › {{ $printShop->name ?? '' }} @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">
   
    <!-- form start -->
    <form role="form" method="POST" action="{{ route('print-shop.update', $printShop) }}" id="edit-form">
        @method('PUT')
        @csrf

        @if ($errors->any())
        {{ $errors }}
        @endif

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" 
                            value="{{ old('name', $printShop->name) }}">
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $printShop->email) }}" required>
                        <small> This email will be used for sending de orders. </small>
                    </div>
                </div>


            </div>
        </div>

        <div class="card-footer">
            </form>
            <button type="submit" class="btn btn-success" form="edit-form">Submit</button>
        </div>

    </form>
</div>

@endsection