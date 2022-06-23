<section id="photo_review">

    <div class="container">

        <!-- header -->
        <div class="row">

            <div class="col-lg-10 m-auto">
                <div class="header text-center">
                    <h2>PHOTO REVIEWS</h2>
                </div>
            </div>

        </div>

        <!-- photo_review content -->
        <div class="photo_review_content">

            <div class="row">
                @foreach ($reviewsImage as $image)


                <!-- item -->
                <div class="col-lg-3 col-sm-4 col-">
                    <a href="">
                        <div class="photo_review_item">
                            <img src="{{ $image->attachment }}" class="img-fluid" alt="">
                        </div>
                    </a>
                </div>

                @endforeach


            </div>

        </div>


    </div>

</section>
