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
                        <li class="breadcrumb-item active" aria-current="page">Sale List</li>
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
                        Sale List
                    </div>
                    <div class="col-md-6" style="text-align:right;">
                        <a href="{{route('admin.selling.create')}}" class="btn btn-primary">
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Sale Add
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Customer</th>
                            <th>Price</th>
                            <th>Sale Date</th>
                            <th>Transactions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales as $salesKey => $sale)
                        <tr>
                            <td>{{$sale['productName']}}</td>
                            <td>
                                @foreach($customers as $customersKeys => $customer)
                                    @if($customer['id']==$sale['customerId'])
                                        {{$customer['name']}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$sale['finalPrice']}}</td>
                            <td>{{$sale['saleDate']}}</td>
                            <td class="transactionsButtons">
                                <a href="{{route('admin.selling.edit',$sale->id)}}">
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