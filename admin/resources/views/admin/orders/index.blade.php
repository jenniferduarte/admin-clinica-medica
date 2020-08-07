@extends('admin.layout.template')

@section('page-name') Orders @endsection {{-- Page Name  --}}

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card card-primary">
    <div class="card-body">

        <table id="orders" class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Payment Status</th>
                    <th>Total Price</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $i => $order)
                <tr>
                    <td>{{ $order['id'] }}</td>
                    <td>{{ $order['customer'] }}</td>
                    <td><span class="badge badge-{{ $order['payment_status'] }}"> {{ $order['payment_status'] }} </span></td>
                    <td class="money">{{ $order['amount'] }}</td>
                    <td>{{ $order['updated_at']->format('m/d/Y h:i A') }}</td>

                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('orders.show', $order['id']) }}" class="btn btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection