
<!doctype html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>{{ env('APP_NAME') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="{{ $pageGlobalData->setting->description }}">
        <meta name="keywords" content="{{ $pageGlobalData->setting->keyword }}">
        <meta name="author" content="Oladipo Damilare (KoderiaNG)">
        <meta name="email" content="koderiang@gmail.com">
        <meta name="website" content="https://koderiatechnologies.ng">
        <meta name="Version" content="v4.7.0">

        <!-- favicon -->
        <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
        
        <!-- Css -->
        <link href="{{asset('landingAssets/libs/tiny-slider/tiny-slider.css')}}" rel="stylesheet">
        <link href="{{asset('landingAssets/libs/swiper/css/swiper.min.css')}}" rel="stylesheet">
        <link href="{{asset('landingAssets/libs/tobii/css/tobii.min.css')}}" rel="stylesheet">
        <!-- Bootstrap Css -->
        <link href="{{asset('landingAssets/css/bootstrap.min.css')}}" id="bootstrap-style" class="theme-opt" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="{{asset('landingAssets/libs/@mdi/font/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('landingAssets/libs/@iconscout/unicons/css/line.css')}}" type="text/css" rel="stylesheet">
        <!-- Style Css-->
        <link href="{{asset('landingAssets/css/style.min.css')}}" id="color-opt" class="theme-opt" rel="stylesheet" type="text/css">
    </head>

    <body>
        @include('sweetalert::alert')
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
        <!-- Loader -->
        
        
        
        <!-- Navbar Start -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a class="logo" href="{{url('/')}}">
                    <span class="logo-light-mode">
                        <img src="{{ asset($pageGlobalData->setting->logo) }}" class="l-dark" height="150" style="margin-top: -30%" alt="">
                        <img src="{{ asset($pageGlobalData->setting->footer_logo) }}" class="l-light" height="150" style="margin-top: -30%" alt="">
                    </span>
                    <img src="{{ asset($pageGlobalData->setting->footer_logo) }}" height="150" style="margin-top: -30%" class="logo-dark-mode" alt="">
                </a>
                </div>

                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

                

                <div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu nav-light">
                        <li><a href="{{url('/')}}" class="sub-menu-item">Home</a></li>
                        <li><a href="{{url('about-us')}}" class="sub-menu-item"> About Us</a></li>
                        <li><a href="{{url('our-events')}}" class="sub-menu-item">Programmes</a></li>
                        <li><a href="{{url('blogs')}}" class="sub-menu-item">News</a></li>
                        <li><a href="{{url('contact')}}" class="sub-menu-item">Contact Us</a></li>
                    </ul><!--end navigation menu-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->