<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <title>{{ config('app.name', 'Diamond Zone') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('frontend_asset/images/fav icon white.svg') }}">
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
    <link rel="stylesheet" href="{{ asset('frontend_asset/css/media.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/xzoom/dist/xzoom.css">

    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-W7HN9CP');
    </script>

    @yield('styles')


</head>
<body>

<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W7HN9CP"
                  height="0" width="0" style="display:none;visibility:hidden">
    </iframe>
</noscript>


<div id="app">


        <div class="preloader">
            <img src="frontend_asset/images/preloader.gif" alt="">
        </div>

        <section id="singUp">

            <div class="container">

                <div class="row">

                    <div class="col-lg-6">

                        <div class="sing_number">
                            <a href="tel:{{ get_setting('helpline_number') }}"><i class="fas fa-phone-alt"></i> {{ get_setting('helpline_number') }}</a>
                        </div>

                    </div>

                    <div class="col-lg-6">

                        <div class="singUp_content d_flex">

                            <form action="{{ route('shop') }}" method="GET">
                                <div class="custome_input">
                                    <input type="text" name="q">

                                    <button class="search">
                                        <i class="fas fa-search"></i>
                                    </button>

                                </div>

                            </form>

                            <div class="sign_in dropdown show">
                                @auth
                                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-home"></i> My Account
                                </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        @if(auth()->user()->user_type == 'admin')
                                        <a class="dropdown-item" style="color: black !important" href="{{ route('admin.dashboard') }}">Dashboard</a>

                                        @else
                                            <a class="dropdown-item" style="color: black !important" href="{{ route('user.dashboard') }}">Dashboard</a>
                                            <a class="dropdown-item" style="color: black !important" href="{{ route('user.orders') }}">My Order</a>
                                        @endif

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
            $categories = \App\Models\Category::with('subcategory')->take(5)->get();
        @endphp
        <nav class="navbar navbar-expand-lg">

            <div class="container">

                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ uploaded_asset(get_setting('header_logo')) ?? asset('frontend_asset/images/logo.svg') }}" alt="">
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
                                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">HOME</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('shop') }}">SHOP</a>
                                    </li>

                                    @foreach ($categories as $category)
                                    <li class="nav-item">

                                        <a class="nav-link @if(count($category->subcategory) > 0) dropdown-toggle @endif" href="{{ route('product_by_category', $category->slug) }}" @if(count($category->subcategory) > 0) id="dropdownMenuButton" data-bs-toggle="dropdown" @endif>
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
                            <a class="nav-link active" aria-current="page" href="{{ route('index') }}">HOME</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop') }}">SHOP</a>
                        </li>

                        @foreach ($categories as $category)
                            <li class="nav-item">

                                <a class="nav-link" href="{{ route('product_by_category', $category->slug) }}">{{ $category->name }}</a>

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

            <a class="backToTop">
                <i class="fas fa-chevron-up"></i>
            </a>
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
    <script src="{{ asset('frontend_asset/js/parsley.min.js') }}"></script>
    <script>


    </script>

    <script src="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.js"></script>

    <script src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>

    @if (session()->has('success'))
        <script>
            showToast('success', 'Success', {{ session()->get('success') }});
        </script>
    @endif

    @if (session()->has('message'))
        <script>
            showToast('warning', 'Warning', {{ session()->get('message') }});
        </script>
    @endif

    <script>


        function buyNow(data, offer){

            if(offer == true){
                offer = 1
            } else {
                offer = 0
            }

            var discount = data.price - (data.price * (data.discount / 100));

            var quantity = $('#quantity').val();
            dataLayer.push({ ecommerce: null });// Clear the previous ecommerce object.
            dataLayer.push({
                event    : "add_to_cart",
                ecommerce: {
                    items: [{
                        item_name     : data['name'], // Name or ID is required.
                        item_id       : data['sku'],
                        price         : discount,
                        item_category : data['category']?.['name'] || "",
                        item_category2: data['subcategory_id'] || "",
                        item_variant  : "",
                        item_list_name: "",  // If associated with a list selection.
                        item_list_id  : "",  // If associated with a list selection.
                        index         : 0,  // If associated with a list selection.
                        quantity      : quantity,
                    }]
                }
            })

            dataLayer.push({ ecommerce: null });// Clear the previous ecommerce object.
            dataLayer.push({
                event    : "begin_checkout",
                ecommerce: {
                    items: [{
                        item_name     : data['name'], // Name or ID is required.
                        item_id       : data['sku'],
                        price         : discount,
                        item_category : data['category']?.['name'] || "",
                        item_category2: data['subcategory_id'] || "",
                        item_variant  : "",
                        item_list_name: "",  // If associated with a list selection.
                        item_list_id  : "",  // If associated with a list selection.
                        index         : 0,  // If associated with a list selection.
                        quantity      : quantity,
                    }]
                }
            })


            $.post('{{ route('checkout.buyNow') }}', {_token: '{{ csrf_token() }}', id:data.id, quantity: quantity, offer:offer}, function(data){

                $('#checkout-modal-body').html(data);
                $('#checkout_modal').modal('show');

            });
            // showToast('warning', 'Warning', 'Please Login First');

        }

        function dataCheckout(data){
            dataLayer.push({ ecommerce: null });// Clear the previous ecommerce object.
            dataLayer.push({
                event    : "purchase",
                ecommerce: {
                    items: [{
                        item_name     : data['name'], // Name or ID is required.
                        item_id       : data['sku'],
                        price         : discount,
                        item_category : data['category']?.['name'] || "",
                        item_category2: data['subcategory_id'] || "",
                        item_variant  : "",
                        item_list_name: "",  // If associated with a list selection.
                        item_list_id  : "",  // If associated with a list selection.
                        index         : 0,  // If associated with a list selection.
                        quantity      : quantity,
                    }]
                }
            })
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
        function checkValue(value){
            if(value == 'bkash' || value == 'nagad'){
                $('.input_file').html('<div class=""><input type="hidden" name="payment_type" value="'+value+'"><div class="custom_input mt-4"><label>Phone Number <span>*</span></label> <input type="text" name="payment_number" placeholder="Phone Number" required> </div> <div class="custom_input mt-4"> <label>Transaction Number <span>*</span></label><input type="text" name="trans_id" placeholder="Transaction Number" required> </div> </div>')
            } else {
                $('.input_file').html('')
            }
        }



    </script>


    @yield('scripts')


</body>
</html>
