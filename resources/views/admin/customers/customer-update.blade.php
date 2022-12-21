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
                        <li class="breadcrumb-item active" aria-current="page">Customer Detail</li>
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
                            <div class="col-md-3">
                                <h4 class="card-title">Customer Detail</h4>
                            </div>
                            <div class="col-md-9" style="text-align:right;">
                                <a href="{{route('admin.customer.index')}}" class="btn btn-secondary">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Customer List
                                </a>
                                <a href="{{route('admin.customer.create')}}" class="btn btn-primary">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Customer Add
                                </a>
                                <a href="{{route('admin.sale',$customer->id)}}" class="btn btn-warning">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Sale Add
                                </a>
                                <a href="{{route('admin.payment',$customer->id)}}" class="btn btn-light">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Payment Add
                                </a>
                                <a href="{{route('admin.debt',$customer->id)}}" class="btn btn-dark">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Debt Add
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route('admin.customer.update',$customer->id)}}" enctype="mulTypeart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{$customer['name']}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Phone</label>
                                            <input type="text" class="form-control" name="phone" id="phone" value="{{$customer['phone']}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Mail</label>
                                            <input type="text" class="form-control" name="mail" id="mail" value="{{$customer['mail']}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Content</label>
                                            <textarea name="note" class="ckeditor" id="ckeditor">{{$customer['note']}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success me-1 mb-1" name="customerUpdate" value="customerUpdate">Update</button>
                                        <button type="submit" class="btn btn-danger me-1 mb-1" name="customerDelete" value="customerDelete">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Contextual classes start -->
                    <section class="section">
                        <div class="row" id="table-contexual">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Customer Sale & Payment & Debt Infos</h4>
                                    </div>
                                    <div class="card-content">
                                        <!-- table contextual / colored -->
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Product</th>
                                                        <th>Price</th>
                                                        <th>Discount(%)</th>
                                                        <th>Payment</th>
                                                        <th>Debt</th>
                                                        <th>Currency</th>
                                                        <th>Detail</th>
                                                        <th>Date</th>
                                                        <th>Transactions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($sales as $salesKey => $sale)
                                                    <tr class="table-success">
                                                        <td>Sale</td>
                                                        <td>{{Str::limit($sale['productName'],25)}}</td>
                                                        <td>{{$sale['price']}}</td>
                                                        <td>{{$sale['discount']}}</td>
                                                        <td>{{$sale['payment']}}</td>
                                                        <td>{{$sale['debt']}}</td>
                                                        <td>{{$sale['currency']}}</td>
                                                        <td>
                                                        <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#sale{{$sale['id']}}">Detail</button>
                                                        <div class="modal fade text-left" id="sale{{$sale['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <p><b>Product :</b> {{$sale['productName']}}</p>
                                                                        <p><b>Price :</b> {{$sale['price']}}</p>
                                                                        <p><b>İndirm :</b> %{{$sale['discount']}}</p>
                                                                        <p><b>Payment :</b> {{$sale['payment']}}</p>
                                                                        <p><b>Debt :</b> {{$sale['debt']}}</p>
                                                                        <p><b>Currency :</b> {{$sale['currency']}}</p>
                                                                        <p><b>Date :</b> {{$sale['saleDate']}}</p>
                                                                        <p><b>Note: </b>
                                                                            @if(!isset($sale['note']))
                                                                                No Note
                                                                            @else
                                                                                {{$sale['note']}}
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn" data-bs-dismiss="modal"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </td>
                                                        <td>{{$sale['saleDate']}}</td>
                                                        <td><a href="{{route('admin.saleDelete',array($sale->id,$customer->id))}}" class="btn btn-sm btn-dancer">Delete</a></td>
                                                    </tr>
                                                    @endforeach
                                                    @foreach($payments as $paymentsKey => $payment)
                                                    <tr class="table-primary">
                                                        <td>Payment</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>{{$payment['payment']}}</td>
                                                        <td>-</td>
                                                        <td>{{$payment['currency']}}</td>
                                                        <td>
                                                        <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#payment{{$payment['id']}}">Detail</button>
                                                        <div class="modal fade text-left" id="payment{{$payment['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <p><b>Payment :</b> {{$payment['payment']}}</p>
                                                                        <p><b>Currency :</b> {{$payment['currency']}}</p>
                                                                        <p><b>Date :</b> {{$payment['paymentDate']}}</p>
                                                                        <p><b>Note: </b>
                                                                            @if(!isset($payment['note']))
                                                                                No Note
                                                                            @else
                                                                                {{$payment['note']}}
                                                                            @endif
                                                                        </p>
                                                                        @if(isset($payment['title']))
                                                                        <p><b>Description :</b> {{$payment['title']}}</p>
                                                                        @endif
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn" data-bs-dismiss="modal"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </td>
                                                        <td>{{$payment['paymentDate']}}</td>
                                                        <td><a href="{{route('admin.paymentDelete',array($payment->id,$customer->id))}}" class="btn btn-sm btn-dancer">Delete</a></td>
                                                    </tr>
                                                    @endforeach
                                                    @foreach($debts as $debtsKey => $debt)
                                                    <tr class="table-danger">
                                                        <td>Debt</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>{{$debt['debt']}}</td>
                                                        <td>{{$debt['currency']}}</td>
                                                        <td>
                                                        <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#debt{{$debt['id']}}">Detail</button>
                                                        <div class="modal fade text-left" id="debt{{$debt['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <p><b>Debt :</b> {{$debt['debt']}}</p>
                                                                        <p><b>Currency :</b> {{$debt['currency']}}</p>
                                                                        <p><b>Date :</b> {{$debt['debtDate']}}</p>
                                                                        <p><b>Note: </b>
                                                                            @if(!isset($debt['note']))
                                                                                No Note
                                                                            @else
                                                                                {{$debt['note']}}
                                                                            @endif
                                                                        </p>
                                                                        @if(isset($debt['title']))
                                                                        <p><b>Description :</b> {{$debt['title']}}</p>
                                                                        @endif
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn" data-bs-dismiss="modal"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </td>
                                                        <td>{{$debt['debtDate']}}</td>
                                                        <td><a href="{{route('admin.debtDelete',array($debt->id,$customer->id))}}" class="btn btn-sm btn-dancer">Delete</a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Contextual classes end -->
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

@if(isset($_GET['delete']))
    @section('script')
        <script>swal('Operation Successful', 'Information Deleted', 'success')</script>
    @endsection
@endif

@endsection