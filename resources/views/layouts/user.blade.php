<!DOCTYPE html>
    <html class="loading" lang="en" data-textdirection="ltr">
    <!-- BEGIN: Head-->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <title>Riken Film Admin Page</title>
        <link rel="apple-touch-icon" href="{{ asset('images/ico/apple-icon-120.png') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/icon.png') }}">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/vendors.min.css') }}">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/colors.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/themes/bordered-layout.css') }}">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/core/menu/menu-types/vertical-menu.css') }}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <!-- END: Custom CSS-->

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    
        
    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->

    <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">

        <!-- BEGIN: Header-->
        <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
            <div class="navbar-container d-flex content">
                <div class="bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav d-xl-none">
                        <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon text-warning" data-feather="star"></i></a>
                            <div class="bookmark-input search-input">
                                <div class="bookmark-input-icon"><i data-feather="search"></i></div>
                                <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0" data-search="search">
                                <ul class="search-list search-list-bookmark"></ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav align-items-center ml-auto">
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>
                        <form class="form-inline my-2 my-lg-0" action="{{route('user.product.search')}}" method="POST">
                            <div class="search-input">
                                @csrf
                                <div class="search-input-icon"><i data-feather="search"></i></div>
                                <input type="search"  name="keyword" class="form-control input" placeholder="Explore..." tabindex="-1" data-search="search">
                                <div class="search-input-close"><i data-feather="x"></i></div>
                            </div>
                        </form>
                    </li>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                         
                                        @if(auth()->user()->is_admin == 1)
                                            <a href="{{route('admin.home')}}"><div class="user-nav d-sm-flex d-none"><span class="user-status">User</span></div></a>
                                        @else
                                            <div class="user-nav d-sm-flex d-none"><span class="user-status">User</span></div>
                                        @endif     
                                        
                                        {{ Auth::user()->name }}
                                </a>

                                

                            </li>
                        @endguest
                    </ul>
                </div>
                    <li class="nav-item dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="account.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="avatar"><img class="round" src="{{ asset('img/user.png') }}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    @if(auth()->user()->is_admin == 1)
                                    <a class="dropdown-item" href="{{ route('admin.home') }}">
                                       Go Admin
                                    </a>
                                        
                                    @else
                                        
                                    @endif     

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    
                                </div>
                    </li>

                    
                </ul>
            </div>
        </nav>
        <!-- END: Header-->

    
        <!-- BEGIN: Main Menu-->
        <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li><img src="{{asset('img/logo.png')}}" class="logo-img"></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <div class="main-menu-content">
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('user.account.view')}}"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Chat">Account</span></a>
                    </li>
                    <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('home')}}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Home</span></a>
                     
                    </li>
                    <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Pages</span><i data-feather="more-horizontal"></i>
                    </li>
                    <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('user.order.view')}}"><i data-feather="file"></i><span class="menu-title text-truncate" data-i18n="Chat">Order</span></a>
                    </li>
                    <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('user.cart.view')}}"><i data-feather="shopping-cart"></i><span class="menu-title text-truncate" data-i18n="Categories">Cart</span></a>
                    </li>
                    <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('user.product.view')}}"><i data-feather="box"></i><span class="menu-title text-truncate" data-i18n="Product">Product</span></a>
                    </li>

                    <li class="nav-item"><a class="d-flex align-items-center" href="{{route('user.warranty.view')}}"><i data-feather="check-square"></i><span class="menu-title text-truncate" data-i18n="Calendar">Warranty</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: Main Menu-->




        <!-- BEGIN: Vendor JS-->
        <script src="{{ asset('vendors/js/vendors.min.js') }}"></script>
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="{{ asset('js/core/app-menu.js') }}"></script>
        <script src="{{ asset('js/core/app.js') }}"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <!-- END: Page JS-->

        <script>
            $(window).on('load', function() {
                if (feather) {
                    feather.replace({
                        width: 14,
                        height: 14
                    });
                }
            })
        </script>
    </body>
    <!-- END: Body-->
    @yield('content')