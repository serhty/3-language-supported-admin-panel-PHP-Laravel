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
                        <li class="breadcrumb-item active" aria-current="page">Support Detail</li>
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
                                <h4 class="card-title">Support</h4>
                            </div>
                            <div class="col-md-6" style="text-align:right;">
                                <a href="{{route('admin.support.index')}}" class="btn btn-secondary">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Support List
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route('admin.support.update',$support->id)}}" enctype="mulTypeart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Statu</label>
                                            @if($support->status==2)
                                            <input type="text" class="form-control" value="Reply Waiting" readonly>
                                            @elseif($support->status==1)
                                            <input type="text" class="form-control" value="Answered" readonly>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Name</label>
                                            <input type="text" class="form-control" value="{{$support['name']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Phone</label>
                                            <input type="text" class="form-control" value="{{$support['phone']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Mail</label>
                                            <input type="text" class="form-control" value="{{$support['mail']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Support</label>
                                            <textarea class="ckeditor" id="ckeditor">{{$support['message']}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Support Date</label>
                                            <input type="text" class="form-control" value="{{$support['supportDate']}}" readonly>
                                        </div>
                                    </div>
                                    @if($support->status==1)
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Reply Date</label>
                                            <input type="text" class="form-control" value="{{$support['replyDate']}}" readonly>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Note</label>
                                            <textarea class="ckeditor" name="note" id="ckeditor2">{{$support['note']}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success me-1 mb-1" name="supportUpdate" value="supportUpdate">Update</button>
                                        @if($support->status==2)
                                        <button type="submit" class="btn btn-info me-1 mb-1" name="supportReply" value="supportReply">Answered</button>
                                        @endif
                                        <button type="submit" class="btn btn-danger me-1 mb-1" name="supportDelete" value="supportDelete">Delete</button>
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