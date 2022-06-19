@extends('layouts.app')

@section('content')
<div class="category_page">

    <section id="product_details">

        <div class="container">

            <!-- Header -->
            <div class="row">

                <div class="col-lg-6">

                    <div class="header mt-3">
                        <h4 style="color: #7c9dec;">Home / {{ $product->category->name }} / {{ $product->name }} - {{ $product->sku }}</h4>
                    </div>

                </div>

            </div>

            <!-- Product Details Content -->
            <div class="product_details_content">

                <div class="row">

                    <!-- Image Part -->
                    <div class="col-lg-6">

                        <span class='zoom' id='ex1'>

                            <img src='{{ uploaded_asset($product->thumbnail) }}' xoriginal="{{ uploaded_asset($product->thumbnail) }}" class="xzoom" alt='Daisy on the Ohoopee'/>


                            <div class="xzoom-thumbs">
                                <a href="{{ uploaded_asset($product->thumbnail) }}">
                                <img class="xzoom-gallery" width="80" src="{{ uploaded_asset($product->thumbnail) }}"  xpreview="{{ uploaded_asset($product->thumbnail) }}">
                                </a>

                                @foreach (explode(',', $product->gallary) as $gallary)
                                    <a href="{{ uploaded_asset($gallary) }}">
                                        <img class="xzoom-gallery" width="80" src="{{ uploaded_asset($gallary) }}">
                                    </a>
                                @endforeach


                            </div>
                        </span>

                    </div>

                    <!-- Product Description -->
                    <div class="col-lg-6">

                        <div class="product_description">

                            <h3>{{ $product->name }} {{ $product->sku }}</h3>

                            <ul>
                                {!! $product->short_description !!}
                            </ul>

                            <!-- Amounnt -->
                            <div class="amount">

                                @if($product->discount != 0)

                                <h3>
                                    <del>৳ {{ number_format($product->price, 2) }}</del>
                                </h3> <h3>৳ {{ number_format(($product->price - $product->discount), 2) }}</h3>
                                @else
                                <h3>৳ {{ number_format($product->price, 2) }}</h3>
                                @endif

                            </div>

                            <!-- add to cart -->
                            <div class="add_to_cart d_flex">

                                <div class="custome_input">
                                    <input type="number" id="quantity" value="1" name="" min="1">
                                </div>

                                <a href="javascript:;" onclick="buyNow({{ $product->id }}, false)"> Order Now </a>

                            </div>

                            <!-- Category -->
                            <div class="category_text">

                                <div class="category_items d_flex">
                                    <h5>SKU</h5>
                                    <span>{{ $product->sku }}</span>
                                </div>

                                <div class="category_items d_flex">
                                    <h5>Category</h5>
                                    <span>{{ $product->category->name }}</span>
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
                                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">DESCRIPTION</button>
                                </li>

                                <!-- International Information -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="International-tab" data-bs-toggle="tab" data-bs-target="#International" type="button" role="tab" aria-controls="International" aria-selected="false">INTERNATIONAL INFORMATION</button>
                                </li>

                                <!-- Review -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="Review-tab" data-bs-toggle="tab" data-bs-target="#Review" type="button" role="tab" aria-controls="Review" aria-selected="false">REVIEWS</button>
                                </li>

                            </ul>

                            <!-- Tabs Item -->


                            <div class="tab-content" id="myTabContent">

                                <!-- Description -->
                                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">

                                    <div class="row">

                                        <!-- Descripntion -->
                                        <div class="col-lg-6">
                                            {!! $product->description !!}

                                        </div>

                                        <div class="col-lg-6">

                                            <div class="img">
                                                <img src="{{ uploaded_asset($product->certificate) }}" class="img-fluid" alt="">
                                            </div>

                                        </div>



                                    </div>

                                </div>

                                <!-- International Information -->
                                <div class="tab-pane fade" id="International" role="tabpanel" aria-labelledby="International-tab">

                                    <div class="row">

                                        <!-- Descripntion -->
                                        <div class="col-lg-6">
                                            {!! $product->description !!}

                                        </div>

                                        <div class="col-lg-6">

                                            <div class="img">
                                                <img src="{{ uploaded_asset($product->certificate) }}" class="img-fluid" alt="">
                                            </div>

                                        </div>



                                    </div>

                                </div>

                                <!-- Review -->
                                <div class="tab-pane fade" id="Review" role="tabpanel" aria-labelledby="Review-tab">

                                    <h3>Reviews</h3>
                                    <ul>
                                        <li>There are no reviews yet.</li>
                                        <li>Be the first to review “DIAMOND PENDANT DP-0121”</li>
                                        <li>Your email address will not be published. Required fields are marked *</li>
                                    </ul>

                                    <!-- Rating -->
                                    <div class="rating">
                                        <h4>Your rating *</h4>
                                        <a href="" class="ratingsss"><i class="fas fa-star"></i></a>
                                        <a href="" class="ratingsss"><i class="fas fa-star"></i></a>
                                        <a href="" class="ratingsss"><i class="fas fa-star"></i></a>
                                        <a href=""><i class="fas fa-star"></i></a>
                                        <a href=""><i class="fas fa-star"></i></a>
                                    </div>

                                    <!-- Form Part -->
                                    <div class="form_part">

                                        <form action="" method="">

                                            <div class="custome_input">
                                                <label>Your review *</label>
                                                <textarea name="" id="" rows="3"></textarea>
                                            </div>

                                            <div class="custome_input">
                                                <label>Name *</label>
                                                <input type="text" name="">
                                            </div>

                                            <div class="custome_input">
                                                <label>Email *</label>
                                                <input type="text" name="">
                                            </div>

                                            <div class="custome_input checkbox d_flex">
                                                <input type="checkbox" id="check" name="">
                                                <label for="check">Save my name, email, and website in this browser for the next time I comment.</label>
                                            </div>

                                            <div class="custome_input">
                                                <button>Submit</button>
                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
</div>


{{-- checkout modal  --}}


@endsection


@section('scripts')
    <script>
        $(".xzoom, .xzoom-gallery").xzoom({tint: '#333', Xoffset: 15});

    </script>
@endsection
