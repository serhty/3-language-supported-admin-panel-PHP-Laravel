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
                        <li class="breadcrumb-item active" aria-current="page">Sale Detail</li>
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
                                <h4 class="card-title">Sale Detail</h4>
                            </div>
                            <div class="col-md-6" style="text-align:right;">
                                <a href="{{route('admin.selling.index')}}" class="btn btn-secondary">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Sale List
                                </a>
                                <a href="{{route('admin.selling.create')}}" class="btn btn-primary">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Sale Add
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route('admin.selling.update',$sale->id)}}" enctype="mulTypeart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    @if(!empty($sale['productId']))
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Product</label>
                                            @foreach($products as $productsKeys => $product)
                                                @if($product['id']==$sale['productId'])
                                                    <input type="text" class="form-control" value="{{$product['title'.__('lang.lang_db')]}}" readonly>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($sale['customerId']))
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Customer</label>
                                            @foreach($customers as $customersKeys => $customer)
                                                @if($customer['id']==$sale['customerId'])
                                                    <input type="text" class="form-control" value="{{$customer['name']}}" readonly>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Price </label>
                                            <input type="number" class="form-control" value="{{$sale['price']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Discount Oranı </label>
                                            <input type="number" class="form-control" value="{{$sale['discount']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Final Price </label>
                                            <input type="number" class="form-control" value="{{$sale['finalPrice']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Paid </label>
                                            <input type="number" class="form-control" value="{{$sale['payment']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Debt </label>
                                            <input type="number" class="form-control" value="{{$sale['debt']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Currency </label>
                                            <input type="text" class="form-control" value="{{$sale['currency']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Note</label>
                                            <textarea name="note" class="ckeditor" id="ckeditor">{{$sale['note']}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success me-1 mb-1" name="saleUpdate" value="saleUpdate">Update</button>
                                        <button type="submit" class="btn btn-danger me-1 mb-1" name="saleDelete" value="saleDelete">Delete</button>
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