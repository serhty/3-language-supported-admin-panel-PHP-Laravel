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
                        <li class="breadcrumb-item active" aria-current="page">Header Menu Detail</li>
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
                                <h4 class="card-title">Header Menu</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        @foreach($menus as $menusKey => $menu)
                        <div class="card-body">
                            <form class="form" method="post" action="{{route('admin.headerMenu.update',$menu->id)}}" enctype="mulTypeart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Title</label>
                                            <input type="text" class="form-control" name="title{{__('lang.lang_db')}}" id="title{{__('lang.lang_db')}}" value="{{$menu['title'.__('lang.lang_db')]}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Link</label>
                                            <input type="text" class="form-control" name="link{{__('lang.lang_db')}}" id="link{{__('lang.lang_db')}}" value="{{$menu['link'.__('lang.lang_db')]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Top Menu</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="topMenu" id="topMenu">
                                                    <option value="">Non</option>
                                                    @foreach($menus as $menusKey => $topMenu)
                                                        <option value="{{$topMenu->id}}" @if($topMenu->id == $menu['topMenu']) selected @endif>{{$topMenu['title'.__('lang.lang_db')]}}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Row</label>
                                            <input type="number" class="form-control" name="row" id="row" value="{{$menu['row']}}" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <label for="first-name-column"> </label>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success me-1 mb-1" name="menuUpdate" value="menuUpdate">Update</button>
                                            <button type="submit" class="btn btn-danger me-1 mb-1" name="menuDelete" value="menuDelete">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endforeach
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <h5>Header Menu Add</h5>
                            <form class="form" method="post" action="{{route('admin.headerMenu.store')}}" enctype="mulTypeart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Title</label>
                                            <input type="text" class="form-control" name="title{{__('lang.lang_db')}}" id="title{{__('lang.lang_db')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Link</label>
                                            <input type="text" class="form-control" name="link{{__('lang.lang_db')}}" id="link{{__('lang.lang_db')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Top Menu</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="topMenu" id="topMenu">
                                                    <option value="">Non</option>
                                                    @foreach($menus as $menusKey => $topMenu)
                                                        @if(empty($topMenu['topMenu']))
                                                        <option value="{{$topMenu->id}}">{{$topMenu['title'.__('lang.lang_db')]}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Row</label>
                                            <input type="number" class="form-control" name="row" id="row" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <label for="first-name-column"> </label>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info me-1 mb-1" name="menuAdd" value="menuUpdate">Add</button>
                                        </div>
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

@if(isset($_GET['delete']))
    @section('script')
        <script>swal('Operation Successful', 'Information Deleted', 'success')</script>
    @endsection
@endif

@endsection