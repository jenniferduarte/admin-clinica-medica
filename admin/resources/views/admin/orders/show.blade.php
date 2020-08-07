@extends('admin.layout.template')

@section('page-name') View Order #{{ $order->id }} @endsection {{-- Page Name --}}

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
               <figure class="float-left"><img src="{{ asset('img/logo-mtl.png') }}" width="80px" height="auto"></figure>
                <small class="float-right">Order date: {{ $order->created_at->format('m/d/Y h:i A') }}</small>
            </h4>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <h5>Customer</h5>
            <div>
                <strong>{{ $customer['name'] ?? ''}}  </strong><br>
                Email: {{ $customer['email'] }} <br>
                MTL ID: {{ $customer['mtl_id'] }}<br>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <br>
            <b>Order ID:</b> #{{ $order->id }}<br>
            <b>Payment Status: </b><span class="badge badge-{{ $order->payment->status }}"> {{ $order->payment->status }} </span><br>
        </div>
        <!-- /.col -->

    </div>
    <!-- /.row -->
    <br>
    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Qty</th>
                        <th>Custom Name</th>
                        <th>Custom Job</th>
                        <th>Custom BgColor</th>
                        <th>Price</th>
                        <th>Client Customization</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->customization()->get() as $customization)
                    <tr>
                        <td>{{ $customization->id }}</td>
                        <td>{{ $customization->quantity }}</td>
                        <td>{{ $customization->custom_name ?? '---'}}</td>
                        <td>{{ $customization->custom_job ?? '---'}}</td>
                        <td>
                            @if($customization->custom_bgcolor)
                            <i class="fas fa-square" style="color:{{ $customization->custom_bgcolor }}"></i> {{ $customization->custom_bgcolor }}
                            @else
                            ---
                            @endif
                        </td>
                        <td class="money">{{ $customization->value }}</td>
                        <td> 
                            @foreach($customization->files as $key => $file)
                                @if($file->type == File::CLIENT_CUSTOMIZATION )
                                    <a href="{{ $file->url }}" target="_blank" class="btn-link text-secondary">
                                        <i class="fas fa-fw fa-file-pdf"></i> {{ $file->original_name }}
                                    </a>
                                @endif
                            @endforeach        
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <br>
    <div class="row">
        <!-- /.col -->
        <div class="offset-md-9 col-3">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="lead">Total:</th>
                            <td class="money lead">{{ $order->total_price }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row ">
        <div class="col-12">
            <a href="{{ route('orders.index') }}" class="btn btn-default float-right"><i class="fas fa-chevron-left "></i> Voltar</a>
        </div>
    </div>
</div>

@endsection
