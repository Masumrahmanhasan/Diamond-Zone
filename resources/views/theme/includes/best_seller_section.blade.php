
@php
    $best_selling_products = \App\Models\OrderItem::query()
                                            ->with('product')
                                            ->distinct('product_id')
                                            ->get();
@endphp

<section id="Best_seller">

    <div class="container">

        <div class="row">

            <div class="col-lg-10 m-auto">
                <div class="header text-center">
                    <h2>OUR BESTSELLERS</h2>
                </div>
            </div>

        </div>


        <div class="category_content">

            <div class="row">

                @foreach($best_selling_products as $item)
                    <div class="col-lg-3 col-6">

                        <div class="category_item">

                            <a href="categort_details.html">
                                <div class="img">
                                    <img src="frontend_asset/images/category_item1.png" class="img-fluid w-100" alt="">
                                </div>

                            </a>

                            <div class="text">
                                <h3 class="wh">{{ $item->product->name }}</h3>
                                <p class="wh"><del>৳ 7,900.00</del> ৳ 3,680.00</p>

                                <div class="add_to_cart d_flex d_justify">
                                    <a href="">View More</a>
                                    <a href="">Order Now</a>
                                </div>

                            </div>

                            <!-- overlay -->
                            <div class="overlay">
                                <span>Sale</span>
                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </div>

</section>
