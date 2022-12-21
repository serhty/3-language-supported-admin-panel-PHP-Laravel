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
                        <li class="breadcrumb-item active" aria-current="page">Category Comment List</li>
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
                        Category Comment List
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Statu</th>
                            <th>Comment Date</th>
                            <th>Transactions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $commentsKey => $comment)
                        <tr>
                            <td>
                                @foreach($categories as $categoriesKey => $category)
                                    @if($comment->id == $category['id'])
                                        {{ $category['title'.__('lang.lang_db')] }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $comment['name'] }}</td>
                            <td>
                                @if($comment['status']=="1")
                                    On air
                                @elseif($comment['status']=="2")
                                    Waiting for approval
                                @endif
                            </td>
                            <td>{{ $comment['commentDate'] }}</td>
                            <td class="transactionsButtons">
                                <a href="{{route('admin.categoryComment.edit',$comment->id)}}">
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