<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('starter-kit/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('starter-kit/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    @yield('styles')
</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid"
    data-rightbar-onstart="true">
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- LOGO -->
            <a href="{{ url('/') }}" class="logo text-center logo-light">
                <span class="logo-lg">
                    @if (config('app.logo'))
                        <img src="{{ asset(config('app.logo')) }}" alt="" height="16">
                    @else
                </span>
                <span class="logo-sm">
                    @if (config('app.logo_sm'))
                        <img src="{{ asset(config('app.logo_sm')) }}" alt="" height="16">
                    @endif
                </span>
            </a>

            <!-- LOGO -->
            <a href="{{ url('/') }}" class="logo text-center logo-dark">
                <span class="logo-lg">
                    @if (config('app.logo_dark'))
                        <img src="{{ asset(config('app.logo_dark')) }}" alt="" height="16">
                    @endif
                </span>
                <span class="logo-sm">
                    @if (config('app.logo_sm_dark'))
                        <img src="{{ asset(config('app.logo_sm_dark')) }}" alt="" height="16">
                    @endif
                </span>
            </a>

            <div class="h-100" id="leftside-menu-container" data-simplebar>

                <!--- Sidemenu -->
                <ul class="side-nav">


                    @if (config('app.sidebar_title'))
                        <li class="side-nav-title side-nav-item">
                            <a href="javascript:void(0);" class="side-nav-link">
                                <span>{{ config('app.sidebar_title') }}</span>
                            </a>
                        </li>
                    @endif


                    <!--- pecorrer a lista de menus -->
                    @foreach (config('app.menus') as $menu)
                        <li class="side-nav-item">
                            @if (isset($menu['submenu']))
                                <a data-bs-toggle="collapse" href="#sidebar{{ $menu['name'] }}" aria-expanded="false"
                                    aria-controls="sidebar{{ $menu['name'] }}" class="side-nav-link">
                                    <i class="{{ $menu['icon'] }}"></i>
                                    <span> {{ $menu['name'] }} </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebar{{ $menu['name'] }}">
                                    <ul class="side-nav-second-level">
                                        @foreach ($menu['submenu'] as $submenu)
                                            <li>
                                                <a href="{{ url($submenu['url']) }}">{{ $submenu['name'] }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                                <a href="{{ url($menu['url']) }}" class="side-nav-link">
                                    <i class="{{ $menu['icon'] }}"></i>
                                    <span> {{ $menu['name'] }} </span>
                                </a>
                            @endif
                        </li>
                    @endforeach







                </ul>

                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-menu float-end mb-0">
                        <li class="dropdown notification-list d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>



                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="{{ auth()->user()?->avatar }}" alt="user-image" class="rounded-circle">
                                </span>
                                <span>
                                    <span class="account-user-name">{{ auth()->user()?->name }}</span>
                                    <span class="account-position">{{ auth()->user()?->position ?? 'Founder' }}</span>
                                </span>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome {{ auth()->user()?->name ?? 'Guest' }}!</h6>
                                </div>
                                <!-- item-->
                                <a href="{{ route('profile') }}" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span>Profile</span>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout me-1"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>

                    </ul>
                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <div class="app-search dropdown d-none d-lg-block">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control dropdown-toggle" placeholder="Search..."
                                    id="top-search">
                                <span class="mdi mdi-magnify search-icon"></span>
                                <button class="input-group-text btn-primary" type="submit">Search</button>
                            </div>
                        </form>

                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">

                        </div>
                    </div>
                </div>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a
                                                href="javascript: void(0);">{{ $pageTitle }}</a></li>
                                        <li class="breadcrumb-item"><a
                                                href="javascript: void(0);">{{ $subPageTitle }}</a></li>
                                        <li class="breadcrumb-item active">{{ $activePage }}</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">{{ $activePage }}</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            @yield('content')
                        </div>
                    </div>

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © {{ config('app.name') }}.
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>

<!-- END wrapper -->



<div class="rightbar-overlay"></div>
<!-- /End-bar -->


<!-- bundle -->

<script src="{{ asset('starter-kit/js/vendor.min.js') }}"></script>
<script src="{{ asset('starter-kit/js/app.min.js') }}"></script>
<script src="{{ asset('starter-kit/js/custom.js') }}"></script>
@yield('scripts')
</body>

<!-- Mirrored from coderthemes.com/hyper/saas/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:21:17 GMT -->

</html>
