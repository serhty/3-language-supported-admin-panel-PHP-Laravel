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
                        <li class="breadcrumb-item active" aria-current="page">Add Admin</li>
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
                                <h4 class="card-title">Add Admin</h4>
                            </div>
                            <div class="col-md-6" style="text-align:right;">
                                <a href="{{route('admin.admin.index')}}" class="btn btn-secondary">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Admin List
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route('admin.admin.store')}}" enctype="mulTypeart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Username</label>
                                            <input type="text" class="form-control" name="username" id="username" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Password</label>
                                            <input type="text" class="form-control" name="password" id="password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Authority <small>(Permission to Add Admin and View Recent Transactions?)</small></label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="status" id="status">
                                                    <option value="2">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-info me-1 mb-1" name="adminAdd" value="adminAdd">Add</button>
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
        <script>swal('Error!', 'Please Try Again', 'error')</script>
    @endsection
@endif

@if(isset($_GET['update']))
    @section('script')
        <script>swal('Operation Successful', 'Information Updated', 'success')</script>
    @endsection
@endif

@endsection