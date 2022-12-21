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
                        <li class="breadcrumb-item active" aria-current="page">Sale Add</li>
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
                                <h4 class="card-title">Sale Add</h4>
                            </div>
                            <div class="col-md-6" style="text-align:right;">
                                <a href="{{route('admin.selling.index')}}" class="btn btn-secondary">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Sale List
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route('admin.selling.store')}}" enctype="mulTypeart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Product <small>(If a Registered Product Sale is to be Added, Select a Product, Price Information will be Received Automatically)</small></label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="product" id="product">
                                                    <option value="">Unregistered Product</option>
                                                    @foreach($products as $productsKeys => $product)
                                                        <option value="{{$product->id}}">{{$product['title'.__('lang.lang_db')]}} / @if(isset($product['price'])) Price: {{$product['finalPrice']}} @endif / @if(isset($product['stock']) && $product['stock']<=0) (Out of stock) @endif</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12 notSaveProductDiv">
                                        <div class="form-group">
                                            <label for="first-name-column">Product <small>(If Adding an Unregistered Product Sale, Enter the Product Name)</small></label>
                                            <input type="text" class="form-control" name="productName" id="productName">
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12 notSavePriceDiv">
                                        <div class="form-group">
                                            <label for="first-name-column">Price <small>(If An Unregistered Product Sale Is To Be Added, Enter Product Price)</small></label>
                                            <input type="number" class="form-control" name="price" id="price">
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12 notSaveDiscountDiv">
                                        <div class="form-group">
                                            <label for="first-name-column">Discount <small>(Type Discount Rate If An Unregistered Product Sale Is To Be Added)</small></label>
                                            <input type="number" class="form-control" name="discount" id="discount">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12 notSaveCurrencyDiv">
                                        <div class="form-group">
                                            <label for="first-name-column">Currency</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="currency" id="currency">
                                                    <option value="$">$</option>
                                                    <option value="€">€</option>
                                                    <option value="₽">₽</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Paid </label>
                                            <input type="number" class="form-control" name="payment" id="payment">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Customer <small>(If Adding a Registered Customer Sale, Select Customer, Customer Information Will Be Imported Automatically)</small></label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="customer" id="customer">
                                                    <option value="">Unregistered Customer</option>
                                                    @foreach($customers as $customersKeys => $customer)
                                                        <option value="{{$customer->id}}">{{ $customer['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12 notSaveCustomerDiv">
                                        <div class="form-group">
                                            <label for="first-name-column">Customer Name <small>(Customer Name If Adding an Unregistered Customer Sale)</small></label>
                                            <input type="text" class="form-control" name="customerName" id="customerName">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Note</label>
                                            <textarea name="note" class="ckeditor" id="ckeditor"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-info me-1 mb-1" name="saleAdd" value="saleAdd">Add</button>
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

@if($errors->any())
    @section('script')
        <script>swal('Error!', 'Please try again', 'error')</script>
    @endsection
@endif

@if(isset($_GET['update']))
    @section('script')
        <script>swal('Operation Successful', 'Information Updated', 'success')</script>
    @endsection
@endif

@section('script')
<script>
$(document).ready(function(){
    $('#product option[value=""]').attr('selected', 'selected');
    $("select#product").change(function(){
        var selectedproduct = $(this).children("option:selected").val();
        if (selectedproduct == "") {
            $(".notSaveProductDiv").removeClass("notShow");
            $(".notSavePriceDiv").removeClass("notShow");
            $(".notSaveDiscountDiv").removeClass("notShow");
            $(".notSaveCurrencyDiv").removeClass("notShow");
        } else {
            $(".notSaveProductDiv").addClass("notShow");
            $(".notSavePriceDiv").addClass("notShow");
            $(".notSaveDiscountDiv").addClass("notShow");
            $(".notSaveCurrencyDiv").addClass("notShow");
        }
    });
    $("select#customer").change(function(){
        var selectedcustomer = $(this).children("option:selected").val();
        if (selectedcustomer == "") {
            $(".notSaveCustomerDiv").removeClass("notShow");
        } else {
            $(".notSaveCustomerDiv").addClass("notShow");
        }
    });
});
</script>
@endsection

@endsection