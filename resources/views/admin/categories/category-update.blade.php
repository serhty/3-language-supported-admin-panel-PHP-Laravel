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
                        <li class="breadcrumb-item active" aria-current="page">Category Detail</li>
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
                                <h4 class="card-title">Category Detail</h4>
                            </div>
                            <div class="col-md-6" style="text-align:right;">
                                <a href="{{route('admin.category.index')}}" class="btn btn-secondary">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Category List
                                </a>
                                <a href="{{route('admin.category.create')}}" class="btn btn-primary">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Category Add
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route('admin.category.update',$category->id)}}" enctype="mulTypeart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Title</label>
                                            <input type="text" class="form-control" name="title{{__('lang.lang_db')}}" id="title{{__('lang.lang_db')}}" value="{{$category['title'.__('lang.lang_db')]}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Link</label>
                                            <input type="text" class="form-control" value="{{$settings['url'.__('lang.lang_db')]}}/{{$category['link'.__('lang.lang_db')]}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Description</label>
                                            <input type="text" class="form-control" name="description{{__('lang.lang_db')}}" id="description{{__('lang.lang_db')}}" value="{{$category['description'.__('lang.lang_db')]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Keywords</label>
                                            <input type="text" class="form-control" name="keywords{{__('lang.lang_db')}}" id="keywords{{__('lang.lang_db')}}" value="{{$category['keywords'.__('lang.lang_db')]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Content</label>
                                            <textarea name="content{{__('lang.lang_db')}}" class="ckeditor" id="ckeditor">{{$category['content'.__('lang.lang_db')]}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Image <small>(The image format can be jpeg,jpg,png and the image size must be less than 5MB.)</small></label>
                                            <input class="form-control" type="file" name="image[]" id="image[]" mulTypele="mulTypele">
                                            @if($errors->any())
                                                @foreach($errors->all() as $error)
                                                    <p class="image_upload_error">{{$error}}</p>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="card-body image_card">
                                            <div class="row">
                                                <b>Images</b>
                                                @foreach($categoryImages as $categoryImagesKey => $image)
                                                <div class="col-6 col-sm-6 col-lg-3 image_div">
                                                    <a href="{{asset('public/')}}/images/{{$image->image}}"
                                                    data-fancybox="{{$category['title'.__('lang.lang_db')]}}"
                                                    data-caption="{{$category['title'.__('lang.lang_db')]}}"
                                                    data-speed="700">
                                                        <img class="w-100 form_img" src="{{asset('public/')}}/images/{{$image->image}}">
                                                    </a>
                                                    <div class="btn-group btn-group-sm image_buttons" role="group">
                                                        @if($image->cover!=1)
                                                        <button type="submit" class="btn btn-light" name="makeCover" value="{{$image->id}}">Make Cover</button>
                                                        @endif
                                                        <button type="submit" class="btn btn-danger" name="deleteImage" value="{{$image->id}}">Delete</button>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success me-1 mb-1" name="categoryUpdate" value="categoryUpdate">Update</button>
                                        <button type="submit" class="btn btn-danger me-1 mb-1" name="categoryDelete" value="categoryDelete">Delete</button>
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