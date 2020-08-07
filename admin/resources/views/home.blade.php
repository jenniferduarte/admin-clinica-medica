@extends('admin.layout.template')

@section('page-name') Dashboard @endsection {{-- Page Name --}}

@section('content')

<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3 id="orders"><i class="fas fa-spinner fa-spin"></i></h3>
                <p>Orders</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><sup style="font-size: 20px">$</sup>
                    <span id="amount"><i class="fas fa-spinner fa-spin"></i> </span>                  
                </h3>

                <p>Amount paid</p>
            </div>
            <div class="icon">
                <i class="ion ion-cash"></i>
                <ion-icon name="color-palette-outline"></ion-icon>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3 id="customers"> <i class="fas fa-spinner fa-spin"></i></h3>

                <p>Customers</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3 id="customizations"><i class="fas fa-spinner fa-spin"></i></h3>

                <p>Customizations</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-color-palette"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="latestOrders" class="table m-0">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Payment Status</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center mb-10">
                                    <i class="fas fa-spinner fa-spin"></i>
                                </td>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <a href="{{route('orders.index')}}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
            </div>
            <!-- /.card-footer -->
        </div>

    </div>
</div>

@endsection

@section('javascript')

{{-- General Metrics --}}
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $.ajax({
            type: 'GET', 
            url: '/general-metrics',
            success: function(data) {
                if(data.metrics) {
                    $('#orders').html(data.metrics.orders);
                    $('#customers').html(data.metrics.customers);
                    $('#customizations').html(data.metrics.customizations);
                    $('#amount').html(data.metrics.amount_paid);
                    $('#amount').mask('000.000.000.000.000,00', {reverse: true});

                }else{
                   
                }
                
            }
        });
    });

</script>


{{-- Latest orders --}}
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){

        $.ajax({
            type: 'GET',
            url: '/latest-orders',
            success: function(data) {
                $('#latestOrders tbody').empty();
            
            if(data.orders){
                    $(data.orders).each(function(index,order){
                        $('#latestOrders tbody').append(
                        `<tr>
                            <td>#${order.id}</td>
                            <td>${order.customer}</td>
                            <td><span class="badge badge-${order.payment_status}">${order.payment_status}</span></td>
                            <td class="money">${order.amount}</td>
                        </tr>`
                        );
                    });

                    $('.money').mask('000.000.000.000.000,00', {reverse: true});

            }else{
                    $('#latestOrders tbody').append(`
                        <tr>
                            <td colspan="4" class="text-center mb-10">
                                No orders found.
                            </td>
                        </tr>
                    `);
            }
            
            }
        });
    });
</script>
@endsection