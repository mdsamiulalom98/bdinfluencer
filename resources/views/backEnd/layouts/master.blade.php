<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <title>@yield('title') - {{$generalsetting->name}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset($generalsetting->favicon)}}" />

        <!-- Bootstrap css -->
        <link href="{{asset('public/backEnd/')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{asset('public/backEnd/')}}/assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!-- icons -->
        <link href="{{asset('public/backEnd/')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- toastr css -->
        <link rel="stylesheet" href="{{asset('public/backEnd/')}}/assets/css/toastr.min.css" />
        <!-- custom css -->
        <link href="{{asset('public/backEnd/')}}/assets/css/custom.css" rel="stylesheet" type="text/css" />
        <!-- Head js -->
        @yield('css')
        <script src="{{asset('public/backEnd/')}}/assets/js/head.js"></script>
    </head>

    <!-- body start -->
    <body data-layout-mode="default" data-theme="light" data-layout-width="fluid" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size="default" data-sidebar-user="false">
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-end mb-0">
                        <li class="dropdown d-inline-block d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username" />
                                </form>
                            </div>
                        </li>

                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                                <i class="fe-maximize noti-icon"></i>
                            </a>
                        </li>

                       

                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset(Auth::user()->image)}}" alt="user-image" class="rounded-circle" />
                                <span class="pro-user-name ms-1"> {{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="{{route('dashboard')}}" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>Dashboard</span>
                                </a>

                                <!-- item-->
                                <a href="{{route('change_password')}}" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>Change Password</span>
                                </a>

                                <!-- item-->
                                <a href="{{route('locked')}}" class="dropdown-item notify-item">
                                    <i class="fe-lock"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    class="dropdown-item notify-item"
                                >
                                    <i class="fe-log-out me-1"></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        <!--<li class="dropdown notification-list">-->
                        <!--    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">-->
                        <!--        <i class="fe-settings noti-icon"></i>-->
                        <!--    </a>-->
                        <!--</li>-->
                    </ul>

                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="{{url('admin/dashboard')}}" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="{{asset($generalsetting->white_logo)}}" style="height: auto;width: 100%" alt="" />
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset($generalsetting->dark_logo)}}" style="height: auto;width: 100%" alt="" />
                                <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                        </a>

                        <a href="{{url('admin/dashboard')}}" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="{{asset($generalsetting->white_logo)}}" style="height: auto;width: 100%" alt=""  />
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset($generalsetting->white_logo)}}" style="height:auto;width: 100%;" alt="" />
                            </span>
                        </a>
                    </div>

                    <ul class="d-flex list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile waves-effect waves-light">
                                <i class="fe-menu"></i>
                            </button>
                        </li>

                        <li>
                            <!-- Mobile menu toggle (Horizontal Layout)-->
                            <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                        <li class="dropdown d-none d-xl-block">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" href="{{route('home')}}" target="_blank"> <i data-feather="globe"></i> Visit Site </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">
                <div class="h-100" data-simplebar>
                    <!-- User box -->
                    <div class="user-box text-center">
                        <img src="{{asset('public/backEnd/')}}/assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md" />
                        <div class="dropdown">
                            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown">{{Auth::user()->name}}</a>
                            <div class="dropdown-menu user-pro-dropdown">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user me-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings me-1"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-lock me-1"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <a
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    class="dropdown-item notify-item"
                                >
                                    <i class="fe-log-out me-1"></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <p class="text-muted">Admin Head</p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul id="side-menu">
                            <li>
                                <a href="{{url('admin/dashboard')}}">
                                    <i data-feather="airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            
                            <!-- nav items -->
                            <li class="@if(request()->is(['admin/categories/*', 'admin/categories/*', 'admin/subcategories/*', 'admin/childcategories/*', 'admin/brands/*', 'admin/flavors/*', 'admin/sizes/*', 'admin/reviews/*'])) menuitem-active @endif">
                                <a href="#siebar-product" data-bs-toggle="collapse" @if(request()->is(['admin/categories/*', 'admin/categories/*', 'admin/subcategories/*', 'admin/childcategories/*', 'admin/brands/*', 'admin/flavors/*', 'admin/sizes/*', 'admin/reviews/*'])) aria-expanded="true" @endif>
                                    <i data-feather="database"></i>
                                    <span> Posts </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse @if(request()->is(['admin/categories/*', 'admin/categories/*', 'admin/subcategories/*', 'admin/childcategories/*', 'admin/brands/*', 'admin/flavors/*', 'admin/sizes/*', 'admin/reviews/*'])) show @endif"  id="siebar-product">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('posts.index')}}"><i data-feather="file-plus"></i> Post Manage</a>
                                        </li>
                                        <li>
                                            <a href="{{route('categories.index')}}"><i data-feather="file-plus"></i> Categories</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- nav items end -->
                            <li class="@if(request()->is(['admin/users/*', 'admin/roles/*', 'admin/permissions/*', 'admin/customer/*'])) menuitem-active @endif">
                                <a href="#sidebar-users" data-bs-toggle="collapse" @if(request()->is(['admin/users/*', 'admin/roles/*', 'admin/permissions/*', 'admin/customer/*'])) aria-expanded="true" @endif>
                                    <i data-feather="user"></i>
                                    <span> Users </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse @if(request()->is(['admin/users/*', 'admin/roles/*', 'admin/permissions/*', 'admin/customer/*'])) show @endif" id="sidebar-users">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('users.index')}}"><i data-feather="file-plus"></i> User</a>
                                        </li>
                                        <li>
                                            <a href="{{route('roles.index')}}"><i data-feather="file-plus"></i> Roles</a>
                                        </li>
                                        <li>
                                            <a href="{{route('permissions.index')}}"><i data-feather="file-plus"></i> Permissions</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                            <!-- nav items -->
                            <li class="@if(request()->is(['admin/settings/*', 'admin/social-media/*', 'admin/shipping-charge/*', 'admin/orderstatus/*'])) menuitem-active @endif">
                                <a href="#siebar-sitesetting" data-bs-toggle="collapse" @if(request()->is(['admin/settings/*', 'admin/social-media/*', 'admin/shipping-charge/*', 'admin/orderstatus/*'])) aria-expanded="true" @endif>
                                    <i data-feather="settings"></i>
                                    <span> Site Setting </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse @if(request()->is(['admin/settings/*', 'admin/social-media/*', 'admin/shipping-charge/*', 'admin/orderstatus/*'])) show @endif" id="siebar-sitesetting">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('settings.index')}}"><i data-feather="file-plus"></i> General Setting</a>
                                        </li>
                                        <li>
                                            <a href="{{route('socialmedias.index')}}"><i data-feather="file-plus"></i> Social Media</a>
                                        </li>
                                        
                                        
                                    </ul>
                                </div>
                            </li>
                            <!-- nav items end -->
                            <li  class="@if(request()->is(['admin/banner-category/*', 'admin/banner/*'])) menuitem-active @endif">
                                <a href="#siebar-banner" data-bs-toggle="collapse" @if(request()->is(['admin/banner-category/*', 'admin/banner/*'])) aria-expanded="true" @endif>
                                    <i data-feather="image"></i>
                                    <span> Banner & Ads </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse @if(request()->is(['admin/banner-category/*', 'admin/banner/*'])) show @endif" id="siebar-banner">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('banner_category.index')}}"><i data-feather="file-plus"></i> Banner Category</a>
                                        </li>
                                        <li>
                                            <a href="{{route('banners.index')}}"><i data-feather="file-plus"></i> Banner & Ads</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- nav items end -->
                            
                            
                            <li  class="@if(request()->is(['admin/page/*'])) menuitem-active @endif">
                                <a href="#sidebar-createpage" data-bs-toggle="collapse" @if(request()->is(['admin/page/*'])) aria-expanded="true" @endif>
                                    <i data-feather="file"></i>
                                    <span> Create Page </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse @if(request()->is(['admin/page/*'])) show @endif" id="sidebar-createpage">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('pages.index')}}"><i data-feather="file-plus"></i> Page Manage</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- nav items end -->
                            
                            <li  class="@if(request()->is(['admin/contact/*'])) menuitem-active @endif">
                                <a href="#sidebar-contact" data-bs-toggle="collapse" @if(request()->is(['admin/contact/*'])) aria-expanded="true" @endif>
                                    <i data-feather="hash"></i>
                                    <span> Contact </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse @if(request()->is(['admin/contact/*'])) show @endif" id="sidebar-contact">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('contact.index')}}"><i data-feather="file-plus"></i> Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- nav items end -->
                           
                        </ul>
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->

            <div class="content-page">
                <div class="content">
                    @yield('content')
                </div>
                <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 text-end">&copy; {{$generalsetting->name}} <a href="https://websolutionit.com" target="_blank">Websolution IT</a></div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->
            </div>
        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link py-2" data-bs-toggle="tab" href="#chat-tab" role="tab">
                            <i class="mdi mdi-message-text d-block font-22 my-1"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-2" data-bs-toggle="tab" href="#tasks-tab" role="tab">
                            <i class="mdi mdi-format-list-checkbox d-block font-22 my-1"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-2 active" data-bs-toggle="tab" href="#settings-tab" role="tab">
                            <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content pt-0">
                    <div class="tab-pane" id="chat-tab" role="tabpanel">
                        <form class="search-bar p-3">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search..." />
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane" id="tasks-tab" role="tabpanel">
                        <h6 class="fw-medium p-3 m-0 text-uppercase">Working Tasks</h6>
                    </div>
                    <div class="tab-pane active" id="settings-tab" role="tabpanel">
                        <h6 class="fw-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
                            <span class="d-block py-1">Theme Settings</span>
                        </h6>

                        <div class="p-3">
                            <div class="alert alert-warning" role="alert"><strong>Customize </strong> the overall color scheme, sidebar menu, etc.</div>

                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="layout-color" value="light" id="light-mode-check" checked />
                                <label class="form-check-label" for="light-mode-check">Light Mode</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="layout-color" value="dark" id="dark-mode-check" />
                                <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                            </div>

                            <!-- Width -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Width</h6>
                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="layout-width" value="fluid" id="fluid-check" checked />
                                <label class="form-check-label" for="fluid-check">Fluid</label>
                            </div>
                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="layout-width" value="boxed" id="boxed-check" />
                                <label class="form-check-label" for="boxed-check">Boxed</label>
                            </div>

                            <!-- Menu positions -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Menus (Leftsidebar and Topbar) Positon</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="menu-position" value="fixed" id="fixed-check" checked />
                                <label class="form-check-label" for="fixed-check">Fixed</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="menu-position" value="scrollable" id="scrollable-check" />
                                <label class="form-check-label" for="scrollable-check">Scrollable</label>
                            </div>

                            <!-- Left Sidebar-->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftbar-color" value="light" id="light-check" />
                                <label class="form-check-label" for="light-check">Light</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftbar-color" value="dark" id="dark-check" checked />
                                <label class="form-check-label" for="dark-check">Dark</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftbar-color" value="brand" id="brand-check" />
                                <label class="form-check-label" for="brand-check">Brand</label>
                            </div>

                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="leftbar-color" value="gradient" id="gradient-check" />
                                <label class="form-check-label" for="gradient-check">Gradient</label>
                            </div>

                            <!-- size -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Size</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftbar-size" value="default" id="default-size-check" checked />
                                <label class="form-check-label" for="default-size-check">Default</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftbar-size" value="condensed" id="condensed-check" />
                                <label class="form-check-label" for="condensed-check">Condensed <small>(Extra Small size)</small></label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftbar-size" value="compact" id="compact-check" />
                                <label class="form-check-label" for="compact-check">Compact <small>(Small size)</small></label>
                            </div>

                            <!-- User info -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Sidebar User Info</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="sidebar-user" value="fixed" id="sidebaruser-check" />
                                <label class="form-check-label" for="sidebaruser-check">Enable</label>
                            </div>

                            <!-- Topbar -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="topbar-color" value="dark" id="darktopbar-check" checked />
                                <label class="form-check-label" for="darktopbar-check">Dark</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="topbar-color" value="light" id="lighttopbar-check" />
                                <label class="form-check-label" for="lighttopbar-check">Light</label>
                            </div>

                            <div class="d-grid mt-4">
                                <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                                <a href="https://1.envato.market/uboldadmin" class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{asset('public/backEnd/')}}/assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="{{asset('public/backEnd/')}}/assets/js/app.min.js"></script>
        <script src="{{asset('public/backEnd/')}}/assets/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
        <script src="{{asset('public/backEnd/')}}/assets/js/sweetalert.min.js"></script>
        <script type="text/javascript">
            $(".delete-confirm").click(function (event) {
                var form = $(this).closest("form");
                event.preventDefault();
                swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
            });
            $(".change-confirm").click(function (event) {
                var form = $(this).closest("form");
                event.preventDefault();
                swal({
                    title: `Are you sure you want to change this record?`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
            });
        </script>
        @yield('script')
    </body>
</html>
