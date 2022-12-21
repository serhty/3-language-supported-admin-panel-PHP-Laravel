@extends('admin.body')
@section('content')

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-12" style="text-align:center;">
                                    <h6 class="font-extrabold mb-0">{{count($products)}}</h6>
                                    <h6 class="text-muted font-semibold">Product</h6>
                                    <a href="{{route('admin.product.index')}}" class="btn btn-primary">Product List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-12" style="text-align:center;">
                                    <h6 class="font-extrabold mb-0">{{count($customers)}}</h6>
                                    <h6 class="text-muted font-semibold">Customer</h6>
                                    <a href="{{route('admin.customer.index')}}" class="btn btn-info">Customer List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-12" style="text-align:center;">
                                    <h6 class="font-extrabold mb-0">{{count($categories)}}</h6>
                                    <h6 class="text-muted font-semibold">Category</h6>
                                    <a href="{{route('admin.category.index')}}" class="btn btn-warning">Category List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="row">
                                <div class="col-md-12" style="text-align:center;">
                                    <h6 class="font-extrabold mb-0">{{count($orders)}}</h6>
                                    <h6 class="text-muted font-semibold">Waiting Order</h6>
                                    <a href="{{route('admin.order.index')}}" class="btn btn-light">Order List</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="row">
                                <div class="col-md-12" style="text-align:center;">
                                    <h6 class="font-extrabold mb-0">{{count($sales)}}</h6>
                                    <h6 class="text-muted font-semibold">Sale</h6>
                                    <a href="{{route('admin.selling.index')}}" class="btn btn-success">Sale List</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="row">
                                <div class="col-md-12" style="text-align:center;">
                                    <h6 class="font-extrabold mb-0">{{count($supports)}}</h6>
                                    <h6 class="text-muted font-semibold">Waiting Support</h6>
                                    <a href="{{route('admin.support.index')}}" class="btn btn-danger">Support List</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Notes To Do</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Note</th>
                                            <th>Statu</th>
                                            <th>Process</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($notes as $notesKey => $note)
                                        <tr>
                                            <td>{{Str::limit($note['note'],90)}}</td>
                                            <td>To Do</td>
                                            <td class="transactionsButtons">
                                                <a href="{{route('admin.note.edit',$note->id)}}">
                                                    <span class="badge bg-warning"><svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#wrench"></use></svg> Detail</span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{asset('public/')}}/images/admin.png" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">{{Auth::user()->username}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content pb-4">
                    <div class="px-4">
                        <a href="{{route('admin.settings.edit',1)}}" class='sidebar-link'>
                            <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Settings</button>
                        </a>
                    </div>
                    <div class="px-4">
                        <a href="{{route('admin.contact.edit',1)}}" class='sidebar-link'>
                            <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Contact</button>
                        </a>
                    </div>
                    <div class="px-4">
                        <a href="{{route('admin.page.index')}}" class='sidebar-link'>
                            <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Pages</button>
                        </a>
                    </div>
                    <div class="px-4">
                        <a href="{{route('admin.logout')}}" class='sidebar-link'>
                            <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Logout</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection