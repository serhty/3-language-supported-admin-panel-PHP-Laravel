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
                        <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- // Basic mulTypele Column Form section start -->
    <section id="mulTypele-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Order Detail</h4>
                            </div>
                            <div class="col-md-6" style="text-align:right;">
                                <a href="{{route('admin.order.index')}}" class="btn btn-secondary">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Order List
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route('admin.order.update',$order->id)}}" enctype="mulTypeart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Order Statu</label>
                                            @if($order['status']=="1")
                                            <input type="text" class="form-control" value="Was delivered" readonly>
                                            @elseif($order['status']=="2")
                                            <input type="text" class="form-control" value="Bekliyor" readonly>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Product</label>
                                            @foreach($products as $productsKeys => $product)
                                                @if($product['id']==$order['productId'])
                                                    <input type="text" class="form-control" value="{{$product['title'.__('lang.lang_db')]}}" readonly>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Product Feature</label>
                                            <input type="text" class="form-control" value="{{$order['productFeature']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Product Feature Type</label>
                                            <input type="text" class="form-control" value="{{$order['productType']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Customer</label>
                                            <input type="text" class="form-control" value="{{$order['name']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Phone</label>
                                            <input type="text" class="form-control" value="{{$order['phone']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Mail</label>
                                            <input type="text" class="form-control" value="{{$order['mail']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Price </label>
                                            <input type="number" class="form-control" value="{{$order['price']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Discount </label>
                                            <input type="number" class="form-control" value="{{$order['discount']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Final Price </label>
                                            <input type="number" class="form-control" value="{{$order['finalPrice']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Currency </label>
                                            <input type="text" class="form-control" value="{{$order['currency']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Order Date </label>
                                            <input type="text" class="form-control" value="{{$order['orderDate']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Message</label>
                                            <textarea class="ckeditor" id="ckeditor">{{$order['message']}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Note</label>
                                            <textarea class="ckeditor" name="note" id="ckeditor2">{{$order['note']}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success me-1 mb-1" name="orderUpdate" value="orderUpdate">Update</button>
                                        @if($order['status']=="2")
                                        <button type="submit" class="btn btn-info me-1 mb-1" name="orderDeliver" value="orderDeliver">Was delivered</button>
                                        @endif
                                        <button type="submit" class="btn btn-danger me-1 mb-1" name="orderDelete" value="orderDelete">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic mulTypele Column Form section end -->
</div>

@if(isset($_GET['add']))
    @section('script')
        <script>swal('Operation Successful', 'Information Added', 'success')</script>
    @endsection
@endif

@if(isset($_GET['update']))
    @section('script')
        <script>swal('Operation Successful', 'Information Updated', 'success')</script>
    @endsection
@endif

@if(isset($_GET['check']))
    @section('script')
        <script>swal('Attention', 'Title Used, Other Information Changed', 'warning')</script>
    @endsection
@endif

@endsection