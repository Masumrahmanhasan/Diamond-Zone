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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/xzoom/dist/xzoom.css">
    @livewireStyles


</head>
<body>

    <div id="app">


        <div class="preloader">
            <img src="frontend_asset/images/preloader.gif" alt="">
        </div>

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
                            {{-- <div class="signUp_cart">
                                <i class="fas fa-cart-arrow-down"></i>
                                <div class="cart_overlay">
                                    <span>0</span>
                                </div>
                            </div> --}}

                            <!-- sing in -->
                            <div class="sign_in dropdown show">
                                @auth
                                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-home"></i> My Account
                                </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" style="color: black !important" href="#">Dashboard</a>
                                        <a class="dropdown-item" style="color: black !important" href="#">My Order</a>
                                        <a class="dropdown-item" style="color: black !important" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                    </div>
                                @else
                                <a href="{{ route('login') }}">
                                    <i class="fas fa-user-circle"></i> Sign In
                                </a>
                                @endauth

                            </div>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>

                    </div>

                </div>

            </div>

        </section>

        {{-- Navbar --}}

        @php
            $categories = \App\Models\Category::with('subcategory')->get();
        @endphp
        <nav class="navbar navbar-expand-lg">

            <div class="container">

                <a class="navbar-brand" href="index.html">
                    <img src="{{ uploaded_asset(get_setting('header_logo')) }}" alt="">
                </a>

                <!-- Mobile Menu -->
                <div class="mobileMenu">

                    <a class="" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                        <i class="fas fa-bars"></i>
                    </a>


                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

                        <div class="offcanvas-header">
                          <h2 class="offcanvas-title" id="offcanvasExampleLabel">Menu Bar</h2>
                          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>

                        <div class="offcanvas-body">

                            <div class="dropdown mt-3">
                                <ul class="navbar-nav ms-auto">

                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Shop</a>
                                    </li>

                                    @foreach ($categories as $category)
                                    <li class="nav-item">

                                        <a class="nav-link @if(count($category->subcategory) > 0) dropdown-toggle @endif" href="#" @if(count($category->subcategory) > 0) id="dropdownMenuButton" data-bs-toggle="dropdown" @endif>
                                            {{ $category->name }}
                                        </a>

                                            @if(count($category->subcategory) > 0)
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                @foreach ($category->subcategory as $subcategory)
                                                <li><a class="dropdown-item" href="#">{{ $subcategory->name }}</a></li>
                                                @endforeach
                                            </ul>
                                            @endif

                                    </li>
                                    @endforeach



                                </ul>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Shop</a>
                        </li>
                        @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ $category->name }}</a>

                            @if(count($category->subcategory) > 0)
                                <ul class="drop_down">

                                    @foreach ($category->subcategory as $subcategory)
                                        <li><a href="">{{ $subcategory->name }}</a></li>
                                    @endforeach

                                </ul>
                            @endif
                        </li>
                        @endforeach

                    </ul>

                </div>

            </div>

        </nav>

            @yield('content')

            <div class="section_gaps"></div>

            @include('theme.includes.footer_section')

            <a class="backToTop"><i class="fas fa-chevron-up"></i></a>
    </div>


    <div class="modal_part">

        <div class="modal fade " id="checkout_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-dialog-centered modal-xl">

                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div id="checkout-modal-body">

                    </div>

                </div>
            </div>
        </div>

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
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.js"></script>

    <script src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>

    @livewireScripts

    <script>
        AOS.init();
    </script>

    <script>
        function buyNow(id){

            @if (auth()->check() && (auth()->user()->user_type == 'user'))

                var quantity = $('#quantity').val();

                $.post('{{ route('checkout.buyNow') }}', {_token: '{{ csrf_token() }}', id:id, quantity: quantity}, function(data){


                    $('#checkout-modal-body').html(data);
                    $('#checkout_modal').modal('show');
                    // if(data != 0){
                    //     $('#wishlist').html(data);
                    //     AIZ.plugins.notify('success', 'Item has been added to wishlist');
                    // }
                    // else{
                    //     showToast('warning', 'Warning', 'Please Login First');
                    // }
                });
            @else
                showToast('warning', 'Warning', 'Please Login First');
            @endif
        }

        function showToast(status, title, text){
            new Notify({
                status: status,
                title: title,
                text: text,
                effect: 'slide',
                speed: 300,
                customClass: null,
                customIcon: null,
                showIcon: true,
                showCloseButton: true,
                autoclose: true,
                autotimeout: 3000,
                gap: 20,
                distance: 20,
                type: 2,
                position: 'right top'
            })
        }
    </script>


    @yield('scripts')


</body>
</html>
