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
                        <li class="breadcrumb-item active" aria-current="page">Contact </li>
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
                        <h4 class="card-title">Contact</h4>
                        Link : {{$settings['url'.__('lang.lang_db')]}}/{{__('lang.contact_link')}}
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route('admin.contact.update',1)}}" enctype="mulTypeart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Whatsapp</label>
                                            <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{ $contact['whatsapp'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Whatsapp Button <small>(Activate Whatsapp Button on the Site?)</small></label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="whatsappButton" id="whatsappButton">
                                                    <option value="1" @php if($contact['whatsappButton']=="1"){ echo "selected"; } @endphp>Yes</option>
                                                    <option value="0" @php if($contact['whatsappButton']=="0"){ echo "selected"; } @endphp>No</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Phone 1</label>
                                            <input type="text" class="form-control" name="phone1" id="phone1" value="{{ $contact['phone1'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Phone 2</label>
                                            <input type="text" class="form-control" name="phone2" id="phone2" value="{{ $contact['phone2'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Mail 1</label>
                                            <input type="text" class="form-control" name="mail1" id="mail1" value="{{ $contact['mail1'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Mail 2</label>
                                            <input type="text" class="form-control" name="mail2" id="mail2" value="{{ $contact['mail2'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Address</label>
                                            <input type="text" class="form-control" name="address" id="address" value="{{ $contact['address'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Location <small>(Share Location Found On Google Maps->Map Embedding->Copy HTML Paste The Code You Get)</small></label>
                                            <input type="text" class="form-control" name="location" id="location" value="{{ $contact['location'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Facebook</label>
                                            <input type="text" class="form-control" name="facebook" id="facebook" value="{{ $contact['facebook'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Instagram</label>
                                            <input type="text" class="form-control" name="instagram" id="instagram" value="{{ $contact['instagram'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Twitter</label>
                                            <input type="text" class="form-control" name="twitter" id="twitter" value="{{ $contact['twitter'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Pinterest</label>
                                            <input type="text" class="form-control" name="pinterest" id="pinterest" value="{{ $contact['pinterest'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Linkedin</label>
                                            <input type="text" class="form-control" name="linkedin" id="linkedin" value="{{ $contact['linkedin'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Youtube</label>
                                            <input type="text" class="form-control" name="youtube" id="youtube" value="{{ $contact['youtube'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Tumblr</label>
                                            <input type="text" class="form-control" name="tumblr" id="tumblr" value="{{ $contact['tumblr'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Reddit</label>
                                            <input type="text" class="form-control" name="reddit" id="reddit" value="{{ $contact['reddit'] }}">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success me-1 mb-1" name="saveContact" value="saveContact">Update</button>
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