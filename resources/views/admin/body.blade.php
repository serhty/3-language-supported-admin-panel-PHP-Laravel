<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <meta name="robots" content="noindex" />
    <meta name="robots" content="nofollow" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/admin/')}}/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('public/admin/')}}/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="{{asset('public/admin/')}}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('public/admin/')}}/assets/css/app.css">
    <link rel="stylesheet" href="{{asset('public/admin/')}}/assets/css/mystyle.css">

    <!-- fancybox -->
    <link rel="stylesheet" href="{{asset('public/')}}/assets/fancybox/jquery.fancybox.min.css" />

    <!-- sweetalert2 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('public/')}}/assets/sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="{{asset('public/')}}/assets/sweetalert/sweetalert2.min.css">
</head>
<body>

<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>
                    <li
                        class="sidebar-item  ">
                        <a href="{{route('admin.home')}}" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#tablet-landscape"></use></svg>
                            <span>Panel</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#globe2"></use></svg>
                            <span>Language</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{url('/panel/locale/de')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#three-dots-vertical"></use></svg> DE
                                </a>
                            </li>
                            @if($settings['lang_en']=="1")
                            <li class="submenu-item ">
                                <a href="{{url('/panel/locale/en')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#three-dots-vertical"></use></svg> EN
                                </a>
                            </li>
                            @endif
                            @if($settings['lang_ru']=="1")
                            <li class="submenu-item ">
                                <a href="{{url('/panel/locale/ru')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#three-dots-vertical"></use></svg> RU
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @if(Auth::user()->status=="1")
                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#person"></use></svg>
                            <span>Admin Transactions</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('admin.admin.index')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Admin List
                                </a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('admin.admin.create')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Admin Add
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <li
                        class="sidebar-item  ">
                        <a href="{{route('admin.settings.edit',1)}}" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#gear"></use></svg>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#blockquote-left"></use></svg>
                            <span>Category Transactions</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('admin.category.index')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Category List
                                </a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('admin.category.create')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Category Add
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#command"></use></svg>
                            <span>Product Transactions</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('admin.product.index')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Product List
                                </a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('admin.product.create')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Product Add
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#emoji-smile"></use></svg>
                            <span>Customer Transactions</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('admin.customer.index')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Customer List
                                </a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('admin.customer.create')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Customer Add
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#cash-stack"></use></svg>
                            <span>Sale Transactions</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('admin.selling.index')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Sale List
                                </a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('admin.selling.create')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Sale Add
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="sidebar-item  ">
                        <a href="{{route('admin.order.index')}}" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#cart"></use></svg>
                            <span>Order List</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#book"></use></svg>
                            <span>Page Transactions</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('admin.page.index')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Page List
                                </a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('admin.page.create')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Page Add
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#pen"></use></svg>
                            <span>Blog Transactions</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('admin.blog.index')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Blog List
                                </a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('admin.blog.create')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Blog Add
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="sidebar-item  ">
                        <a href="{{route('admin.gallery.index')}}" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#camera"></use></svg>
                            <span>Gallery</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item  ">
                        <a href="{{route('admin.contact.edit',1)}}" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#telephone"></use></svg>
                            <span>Contact</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#chevron-bar-up"></use></svg>
                            <span>Menu Transactions</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('admin.headerMenu.index')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Header Menus
                                </a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('admin.footerMenu.index')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Footer Menus
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#card-image"></use></svg>
                            <span>Slider Transactions</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('admin.slider.index')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Slider List
                                </a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('admin.slider.create')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Slider Add
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#caret-right-square"></use></svg>
                            <span>Story Transactions</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('admin.story.index')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Story List
                                </a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('admin.story.create')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Story Add
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="sidebar-item  ">
                        <a href="{{route('admin.support.index')}}" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#chat-quote"></use></svg>
                            <span>Support</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#clipboard"></use></svg>
                            <span>Note Transactions</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('admin.note.index')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#list-check"></use></svg> Note List
                                </a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('admin.note.create')}}">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus"></use></svg> Note Add
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if(Auth::user()->status=="1")
                    <li
                        class="sidebar-item  ">
                        <a href="{{route('admin.latestTransaction.index')}}" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#clipboard-check"></use></svg>
                            <span>Latest Transactions</span>
                        </a>
                    </li>
                    @endif
                    <li
                        class="sidebar-item  ">
                        <a href="{{route('admin.logout')}}" class='sidebar-link'>
                            <svg class="bi" width="1em" height="1em" fill="currentColor"><use xlink:href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.svg#power"></use></svg>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        
    @yield('content')

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>@php echo date("Y"); @endphp &copy; Admin</p>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="{{asset('public/admin/')}}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{asset('public/admin/')}}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('public/admin/')}}/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="{{asset('public/admin/')}}/assets/js/pages/dashboard.js"></script>
<script src="{{asset('public/admin/')}}/assets/js/mazer.js"></script>
<script src="{{asset('public/admin/')}}/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<script src="{{asset('public/admin/')}}/assets/vendors/ckeditor/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#ckeditor'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#ckeditor2'))
        .catch(error => {
            console.error(error);
        });
</script>


<!-- fancybox -->
<script src="{{asset('public/')}}/assets/fancybox/jquery.fancybox.min.js"></script>

@yield('script')
</body>
</html>