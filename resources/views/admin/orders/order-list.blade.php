@extends('admin.body')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-3 order-md-2 order-first">
                <b>Selected Language: {{__('lang.lang')}}</b>
            </div>
            <div class="col-12 col-md-9 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Panel</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        Order List
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Customer Name</th>
                            <th>Price</th>
                            <th>Order Date</th>
                            <th>Statu</th>
                            <th>Transactions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $ordersKey => $order)
                        <tr>
                            <td>
                                @foreach($products as $productsKeys => $product)
                                    @if($product['id']==$order['productId'])
                                        {{$product['title'.__('lang.lang_db')]}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$order['name']}}</td>
                            <td>{{$order['finalPrice']}}</td>
                            <td>{{$order['orderDate']}}</td>
                            <td>
                                @if($order['status']=="1")
                                    Was delivered
                                @elseif($order['status']=="2")
                                    Waiting
                                @endif
                            </td>
                            <td class="transactionsButtons">
                                <a href="{{route('admin.order.edit',$order->id)}}">
                                    <span class="badge bg-warning"><svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#wrench"></use></svg> Detail</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

@if(isset($_GET['delete']))
    @section('script')
        <script>swal('Operation Successful', 'Information Deleted', 'success')</script>
    @endsection
@endif

@if(isset($_GET['add']))
    @section('script')
        <script>swal('Operation Successful', 'Information Added', 'success')</script>
    @endsection
@endif

@endsection