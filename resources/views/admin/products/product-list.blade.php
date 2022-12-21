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
                        <li class="breadcrumb-item active" aria-current="page">Product List</li>
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
                        Product List
                        <br>
                        Products Sayfası Link : {{$settings['url'.__('lang.lang_db')]}}/{{__('lang.products_link')}}
                    </div>
                    <div class="col-md-6" style="text-align:right;">
                        <a href="{{route('admin.product.create')}}" class="btn btn-primary">
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Product Add
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Discount Oranı</th>
                            <th>Discounted Price</th>
                            <th>Currency</th>
                            <th>Stock</th>
                            <th>Transactions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $productsKey => $product)
                        <tr>
                            <td>{{$product['title'.__('lang.lang_db')]}}</td>
                            <td>
                            @foreach($categories as $categoriesKey => $category)
                            @if($category->id == $product->categoryId)
                            {{$category['title'.__('lang.lang_db')]}}
                            @endif
                            @endforeach
                            </td>
                            <td>{{$product['price']}}</td>
                            <td>{{$product['discount']}}</td>
                            <td>{{$product['discountedPrice']}}</td>
                            <td>{{$product['currency']}}</td>
                            <td>{{$product['stock']}}</td>
                            <td class="transactionsButtons">
                                <a href="{{route('admin.product.edit',$product->id)}}">
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