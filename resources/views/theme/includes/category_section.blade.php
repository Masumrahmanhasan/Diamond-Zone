<section id="shopByCategory">

    <div class="container">

        <div class="row">

            <div class="col-lg-10 m-auto">

                <div class="header text-center">
                    <h1>SHOP BY CATEGORY</h1>
                </div>

            </div>

        </div>

        <!-- content -->
        <div class="shopByCategory_content">

            <div class="row">

                @foreach (\App\Models\Category::all() as $key => $category)


                    <div class="@if($key+1 == 1 || $key+1 == 2)col-lg-6 col-sm-6 @else col-lg-4 col-sm-4 @endif">

                        <div class="shopByCategory_item">

                            <a href="javascript:;">
                                <div class="shopByCategory_img">
                                    <img src="{{ $category->featured_image }}" class="img-fluid w-100" alt="">
                                </div>
                            </a>

                        </div>

                    </div>

                @endforeach



            </div>

        </div>

    </div>

</section>
