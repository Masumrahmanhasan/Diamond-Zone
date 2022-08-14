@extends('layouts.app')

@section('meta')

    <meta property="og:title" content="{{ $product['name'] }}" />
    <meta property="og:description" content="{{ $product['short_description'] }}" />
    <meta property="og:image" content="{{ uploaded_asset($product['thumbnail']) }}" />
    <meta property="og:url" content="{{ route('product_details', $product['slug']) }}" />
    <meta property="product:category" content="188">
    <meta property="product:brand" content="Diamond Zone">
    <meta property="product:availability" content="in stock">
    <meta property="product:price:amount" content="{{ $product['discounted_price'] }}">
    <meta property="product:price:currency" content="BDT">
    <meta property="product:retailer_item_id" content="{{ $product['sku'] }}">

@endsection

@section('content')


    <div class="category_page">

        <section id="product_details">

            <div class="container">

                <!-- Header -->
                <div class="row">

                    <div class="col-lg-6">

                        <div class="header mt-3">
                            <h4 style="color: #7c9dec;">Home / {{ $product['category'] }} / {{ $product['name'] }} -
                                {{ $product['sku'] }}</h4>
                        </div>

                    </div>

                </div>

                <!-- Product Details Content -->
                <div class="product_details_content">

                    <div class="row">

                        <!-- Image Part -->
                        <div class="col-lg-6">

                            <span class='zoom' id='ex1'>

                                <img src='{{ uploaded_asset($product['thumbnail']) }}'
                                    xoriginal="{{ uploaded_asset($product['thumbnail']) }}" class="xzoom"
                                    alt='Daisy on the Ohoopee'
                                />


                                <div class="xzoom-thumbs">

                                    <a href="{{ uploaded_asset($product['thumbnail']) }}">
                                        <img class="xzoom-gallery" width="80"
                                            src="{{ uploaded_asset($product['thumbnail']) }}"
                                            xpreview="{{ uploaded_asset($product['thumbnail']) }}">
                                    </a>

                                    @foreach (explode(',', $product['gallary']) as $gallary)
                                        <a href="{{ uploaded_asset($gallary) }}">
                                            <img class="xzoom-gallery" width="80"
                                                src="{{ uploaded_asset($gallary) }}">
                                        </a>
                                    @endforeach

                                </div>

                            </span>

                        </div>

                        <!-- Product Description -->
                        <div class="col-lg-6">

                            <div class="product_description">

                                <h3>{{ $product['name'] }} {{ $product['sku'] }}</h3>

                                <ul>
                                    {!! $product['short_description'] !!}
                                </ul>

                                <!-- Amounnt -->
                                <div class="amount">

                                    @if ($product['discount'] != 0)
                                        <h3>
                                            <del>৳ {{ number_format($product['price'], 2) }}</del>
                                        </h3>
                                        <h3>৳ {{ number_format($product['discounted_price'], 2) }}</h3>
                                    @else
                                        <h3>৳ {{ number_format($product['price'], 2) }}</h3>
                                    @endif

                                </div>

                                <!-- add to cart -->
                                <div class="add_to_cart d_flex">

                                    <div class="custome_input">
                                        <input type="number" id="quantity" value="1" name="" min="1">
                                    </div>

                                    <a href="javascript:;" onclick="buyNow({{ $product['id'] }}, false)"> Order Now </a>

                                </div>

                                <!-- Category -->
                                <div class="category_text">

                                    <div class="category_items d_flex">
                                        <h5>SKU</h5>
                                        <span>{{ $product['sku'] }}</span>
                                    </div>

                                    <div class="category_items d_flex">
                                        <h5>Category</h5>
                                        <span>{{ $product['category'] }}</span>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Review & Conditions -->
            <div class="review_Condition">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="product_tabs">

                                <!-- Tabs Button -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <!-- DESCRIPTION -->
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                            data-bs-target="#description" type="button" role="tab"
                                            aria-controls="description" aria-selected="true">DESCRIPTION</button>
                                    </li>

                                    <!-- International Information -->
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="International-tab" data-bs-toggle="tab"
                                            data-bs-target="#International" type="button" role="tab"
                                            aria-controls="International" aria-selected="false">INTERNATIONAL
                                            INFORMATION</button>
                                    </li>

                                    <!-- Review -->
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="Review-tab" data-bs-toggle="tab"
                                            data-bs-target="#Review" type="button" role="tab" aria-controls="Review"
                                            aria-selected="false">REVIEWS</button>
                                    </li>

                                </ul>

                                <!-- Tabs Item -->


                                <div class="tab-content" id="myTabContent">

                                    <!-- Description -->
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">

                                        <div class="row">

                                            <!-- Descripntion -->
                                            <div class="col-lg-6">
                                                {!! $product['description'] !!}

                                            </div>

                                            <div class="col-lg-6">

                                                <div class="img">
                                                    <img src="{{ uploaded_asset($product['certificate']) }}"
                                                        class="img-fluid" alt="">
                                                </div>

                                            </div>



                                        </div>

                                    </div>

                                    <!-- International Information -->
                                    <div class="tab-pane fade" id="International" role="tabpanel"
                                        aria-labelledby="International-tab">

                                        <div class="row">

                                            <!-- Descripntion -->
                                            <div class="col-lg-6">
                                                {!! $product['description'] !!}

                                            </div>

                                            <div class="col-lg-6">

                                                <div class="img">
                                                    <img src="{{ uploaded_asset($product['certificate']) }}"
                                                        class="img-fluid" alt="">
                                                </div>

                                            </div>



                                        </div>

                                    </div>

                                    <!-- Review -->
                                    <div class="tab-pane fade" id="Review" role="tabpanel"
                                        aria-labelledby="Review-tab">

                                        <h3>Reviews</h3>



                                        <form action="{{ route('product.review_store') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="product_id"
                                                value="{{ $product['id'] }}">
                                            <!-- Rating -->
                                            <div class="form-group">
                                                <label class="opacity-60">Rating</label>
                                                <div class="rating rating-input c-pointer">
                                                    <label>
                                                        <input type="radio" name="rating"
                                                            value="1" required="">
                                                        <i class="fas fa-star"></i>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="rating"
                                                            value="2">
                                                        <i class="fas fa-star"></i>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="rating"
                                                            value="3">
                                                        <i class="fas fa-star"></i>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="rating"
                                                            value="4">
                                                        <i class="fas fa-star"></i>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="rating"
                                                            value="5">
                                                        <i class="fas fa-star"></i>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form_part">
                                                <div class="custome_input">
                                                    <label for="">Your Name</label>
                                                    <input type="text" name="name" required>
                                                </div>
                                            </div>

                                            <div class="form_part">
                                                <div class="custome_input">
                                                    <label for="">Your Email</label>
                                                    <input type="email" name=email" required>
                                                </div>
                                            </div>

                                            <div class="form_part">
                                                <div class="custome_input">
                                                    <input type="file" name="attachment">
                                                </div>
                                            </div>

                                            <!-- Form Part -->
                                            <div class="form_part">

                                                <div class="custome_input">
                                                    <label>Comment *</label>
                                                    <textarea name="body" id="" rows="3"></textarea>
                                                </div>

                                                <div class="custome_input">
                                                    <button type="submit">Submit</button>
                                                </div>

                                            </div>

                                        </form>



                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>
    </div>


    {{-- checkout modal --}}
@endsection


@section('scripts')
    <script>
        $(".xzoom, .xzoom-gallery").xzoom({
            tint: '#333',
            Xoffset: 15
        });

        $(document).ready(function() {
            $(".rating-input").each(function() {
                $(this)
                    .find("label")
                    .on({
                        mouseover: function(event) {
                            $(this).find("svg").addClass("hover");
                            $(this).prevAll().find("svg").addClass("hover");
                        },
                        mouseleave: function(event) {
                            $(this).find("svg").removeClass("hover");
                            $(this).prevAll().find("svg").removeClass("hover");
                        },
                        click: function(event) {
                            $(this).siblings().find("svg").removeClass("active");
                            $(this).find("svg").addClass("active");
                            $(this).prevAll().find("svg").addClass("active");
                        },
                    });
                if ($(this).find("input").is(":checked")) {
                    $(this)
                        .find("label")
                        .siblings()
                        .find("svg")
                        .removeClass("active");
                    $(this)
                        .find("input:checked")
                        .closest("label")
                        .find("svg")
                        .addClass("active");
                    $(this)
                        .find("input:checked")
                        .closest("label")
                        .prevAll()
                        .find("svg")
                        .addClass("active");
                }
            });
        })
    </script>
@endsection
