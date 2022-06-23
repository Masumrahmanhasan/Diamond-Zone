<section id="customer_review">

    <div class="container">

        <!-- Header -->
        <div class="row">

            <div class="col-lg-10 m-auto">
                <div class="header text-center">
                    <h2>CUSTOMER REVIEWS</h2>
                </div>
            </div>

        </div>

        <!-- Customer Review Content -->
        <div class="customer_review_content">

            <div class="row">
                @foreach ($reviews as $review)


                    <!-- Item -->
                    <div class="col-lg-4 col-sm-4">

                        <div class="customer_review_item">

                            <div class="img"><i class="fas fa-gem"></i></div>

                            <div class="text">
                                <p class="wh">{{ $review->body }}</p>
                                <h3 class="wh">{{ $review->user->name }}</h3>
                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</section>
