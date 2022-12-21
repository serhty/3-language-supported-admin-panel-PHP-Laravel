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
                        <li class="breadcrumb-item active" aria-current="page">Settings </li>
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
                        <h4 class="card-title">Settings </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route('admin.settings.update',1)}}" enctype="mulTypeart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Site URL </label>
                                            <input type="text" class="form-control" name="url{{__('lang.lang_db')}}" id="url{{__('lang.lang_db')}}" value="{{$settings['url'.__('lang.lang_db')]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Site Title </label>
                                            <input type="text" class="form-control" name="title{{__('lang.lang_db')}}" id="title{{__('lang.lang_db')}}" value="{{$settings['title'.__('lang.lang_db')]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Site Description </label>
                                            <input type="text" class="form-control" name="description{{__('lang.lang_db')}}" id="description{{__('lang.lang_db')}}" value="{{$settings['description'.__('lang.lang_db')]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Site Keywords </label>
                                            <input type="text" class="form-control" name="keywords{{__('lang.lang_db')}}" id="keywords{{__('lang.lang_db')}}" value="{{$settings['keywords'.__('lang.lang_db')]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">De Lang</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="lang_de" id="lang_de">
                                                    <option value="1" @php if($settings['lang_de']=="1"){ echo "selected"; } @endphp>Active</option>
                                                    <option value="0" @php if($settings['lang_de']=="0"){ echo "selected"; } @endphp>Passive</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">En Lang</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="lang_en" id="lang_en">
                                                    <option value="1" @php if($settings['lang_en']=="1"){ echo "selected"; } @endphp>Active</option>
                                                    <option value="0" @php if($settings['lang_en']=="0"){ echo "selected"; } @endphp>Passive</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Ru Lang</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="lang_ru" id="lang_ru">
                                                    <option value="1" @php if($settings['lang_ru']=="1"){ echo "selected"; } @endphp>Active</option>
                                                    <option value="0" @php if($settings['lang_ru']=="0"){ echo "selected"; } @endphp>Passive</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Logo <small>(The image format can be jpeg,jpg,png and the image size must be less than 5MB.)</small></label>
                                            <input class="form-control" type="file" name="logo" id="logo">
                                            @if($errors->any())
                                                @foreach($errors->all() as $error)
                                                    <p class="image_upload_error">{{$error}}</p>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="card-body image_card">
                                            <div class="row">
                                                <b>Logo</b>
                                                <div class="col-6 col-sm-6 col-lg-3 image_div">
                                                    <a href="{{asset('public/')}}/images/{{$settings->logo}}"
                                                    data-fancybox="{{$settings['title'.__('lang.lang_db')]}}"
                                                    data-caption="{{$settings['title'.__('lang.lang_db')]}}"
                                                    data-speed="700">
                                                        <img class="w-100 form_img" src="{{asset('public/')}}/images/{{$settings->logo}}">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success me-1 mb-1" name="saveSettings" value="saveSettings">Update</button>
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

@endsection