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
                        <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
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
                                <h4 class="card-title">Product Detail</h4>
                            </div>
                            <div class="col-md-6" style="text-align:right;">
                                <a href="{{route('admin.product.index')}}" class="btn btn-secondary">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Product List
                                </a>
                                <a href="{{route('admin.product.create')}}" class="btn btn-primary">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Product Add
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route('admin.product.update',$product->id)}}" enctype="mulTypeart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Category </label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="category" id="category">
                                                    <option value="">Non</option>
                                                    @foreach($categories as $categoriesKeys => $category)
                                                        <option value="{{$category->id}}" @if($category->id == $product->categoryId) selected @endif>{{$category['title'.__('lang.lang_db')]}}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Title</label>
                                            <input type="text" class="form-control" name="title{{__('lang.lang_db')}}" id="title{{__('lang.lang_db')}}" value="{{$product['title'.__('lang.lang_db')]}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Link</label>
                                            @foreach($categories as $categoriesKeys => $category)
                                                @if($category->id == $product->categoryId)
                                                    <input type="text" class="form-control" value="{{$settings['url'.__('lang.lang_db')]}}/{{$category['link'.__('lang.lang_db')]}}/{{$product['link'.__('lang.lang_db')]}}" readonly>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Description</label>
                                            <input type="text" class="form-control" name="description{{__('lang.lang_db')}}" id="description{{__('lang.lang_db')}}" value="{{$product['description'.__('lang.lang_db')]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Keywords</label>
                                            <input type="text" class="form-control" name="keywords{{__('lang.lang_db')}}" id="keywords{{__('lang.lang_db')}}" value="{{$product['keywords'.__('lang.lang_db')]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Content</label>
                                            <textarea name="content{{__('lang.lang_db')}}" class="ckeditor" id="ckeditor">{{$product['content'.__('lang.lang_db')]}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Order Form </label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="orderForm" id="orderForm">
                                                    <option value="0" @if($product->orderForm == "0") selected @endif>Passive</option>
                                                    <option value="1" @if($product->orderForm == "1") selected @endif>Active</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Order Form Title</label>
                                            <input type="text" class="form-control" name="formTitle{{__('lang.lang_db')}}" id="formTitle{{__('lang.lang_db')}}" value="{{$product['formTitle'.__('lang.lang_db')]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Stock</label>
                                            <input type="number" class="form-control" name="stock" id="stock" value="{{$product['stock']}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Price</label>
                                            <input type="number" class="form-control" name="price" id="price" value="{{$product['price']}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Discount(%)</label>
                                            <input type="number" class="form-control" name="discount" id="discount" value="{{$product['discount']}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Currency</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="currency" id="currency">
                                                    <option value="$" @if($product->currency == "$") selected @endif>$</option>
                                                    <option value="€" @if($product->currency == "€") selected @endif>€</option>
                                                    <option value="₽" @if($product->currency == "₽") selected @endif>₽</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Product Feature <small>(Example: Size)</small></label>
                                            <input type="text" class="form-control" name="feature{{__('lang.lang_db')}}" id="feature{{__('lang.lang_db')}}" value="{{$product['feature'.__('lang.lang_db')]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Product Feature Type <small>(Example: Large, Medium, Small) * If more than 1, please separate it with a comma.</small></label>
                                            <input type="text" class="form-control" name="type{{__('lang.lang_db')}}" id="type{{__('lang.lang_db')}}" value="{{$product['type'.__('lang.lang_db')]}}">
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
                                                @foreach($productImages as $productImagesKey => $image)
                                                <div class="col-6 col-sm-6 col-lg-3 image_div">
                                                    <a href="{{asset('public/')}}/images/{{$image->image}}"
                                                    data-fancybox="{{$product['title'.__('lang.lang_db')]}}"
                                                    data-caption="{{$product['title'.__('lang.lang_db')]}}"
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
                                        <button type="submit" class="btn btn-success me-1 mb-1" name="productUpdate" value="productUpdate">Update</button>
                                        <button type="submit" class="btn btn-danger me-1 mb-1" name="productDelete" value="productDelete">Delete</button>
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