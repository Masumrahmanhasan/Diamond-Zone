@if (count($combo_offers) > 0)

<section id="Best_seller">

    <div class="container">

        <div class="row">

            <div class="col-lg-10 m-auto">
                <div class="header text-center">
                    <h2>Combo Offer</h2>
                </div>
            </div>

        </div>

        <!-- Category Content-->
        <div class="category_content">

            <div class="row">

                @foreach ($combo_offers as $offer)

                    @php
                        $product = \App\Models\Product::whereIn('id', json_decode($offer->products))->get();
                    @endphp


                    <div class="col-lg-3 col-sm-4">

                        <div class="category_item">

                            <div class="img">
                                <img src="{{ uploaded_asset($product[0]->thumbnail) }}" class="img-fluid w-100" alt="">
                            </div>

                            <div class="text">
                                <h3 class="wh">{{ $offer->name }}</h3>
                                <p class="wh"><del>৳ {{ number_format($offer->grand_price, 2) }}</del> ৳ {{ discounted_price($offer->grand_price, $offer->discount) }}</p>

                                <div class="add_to_cart d_flex d_justify">
                                    <a href="{{ route('offer.details', $offer->slug) }}">View More</a>
                                    <a onclick="buyNow({{ $offer }}, true)">Order Now</a>
                                </div>

                            </div>

                        </div>

                    </div>
                @endforeach


            </div>

        </div>

    </div>

</section>

@endif
