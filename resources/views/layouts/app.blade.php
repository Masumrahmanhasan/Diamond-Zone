<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Diamond Zone') }}</title>


    <!-- Font Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('frontend_asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_asset/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_asset/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_asset/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_asset/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_asset/css/style.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend_asset/css/media.css') }}">

</head>
<body>

    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

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
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <header id="header">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="header_img">
                            <img src="frontend_asset/images/header.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>

            </div>

        </header>

        <section id="singUp">

            <div class="container">

                <div class="row">

                    <!-- left -->
                    <div class="col-lg-6">

                        <div class="sing_number">
                            <a href="tel:0000000000"><i class="fas fa-phone-alt"></i> 0000000000</a>
                        </div>

                    </div>

                    <!-- Right -->
                    <div class="col-lg-6">

                        <div class="singUp_content d_flex">

                            <!-- input -->
                            <div class="custome_input">
                                <input type="text">

                                <div class="search">
                                    <i class="fas fa-search"></i>
                                </div>

                            </div>

                            <!-- cart -->
                            <div class="signUp_cart">
                                <i class="fas fa-cart-arrow-down"></i>
                                <div class="cart_overlay">
                                    <span>0</span>
                                </div>
                            </div>

                            <!-- sing in -->
                            <div class="sign_in">
                                <a href=""> <i class="fas fa-user-circle"></i> Sign In</a>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- Navbar --}}

        <nav class="navbar navbar-expand-lg">

            <div class="container">

              <a class="navbar-brand" href="index.html">
                  <img src="frontend_asset/images/logo.jpg" alt="">
              </a>

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">SHOP ALL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">EARRING</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown link
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>

            @yield('content')

            <div class="section_gaps"></div>

            @include('theme.includes.footer_section')
    </div>

    <script src="{{ asset('frontend_asset/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('frontend_asset/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend_asset/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend_asset/js/slick.js') }}"></script>
    <script src="{{ asset('frontend_asset/js/font-awesome.min.js') }}"></script>
    <script src="{{ asset('frontend_asset/js/shop.js') }}"></script>
    <script src="{{ asset('frontend_asset/js/custom.js') }}"></script>
    <script src="{{ asset('frontend_asset/js/jquery.elevatezoom.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>


</body>
</html>
