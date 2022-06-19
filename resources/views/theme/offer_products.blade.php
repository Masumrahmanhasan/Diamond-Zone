@extends('layouts.app')


@section('content')
		<div class="category_page">


				<section id="banner">

						<div class="banner_img">
								<a href="">
										<img src="{{ asset('frontend_asset/images/category_banner.jpg') }}" class="img-fluid w-100" alt="">
								</a>
						</div>

						<div class="banner_overlay">
								<h2 class="wh">{{ $offer->name }}</h2>
						</div>

				</section>


				<!-- Section gaps -->
				<div class="section_gaps"></div>



				<div class="section_gaps"></div>

				<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
						START Content part PART
		---------------------------------------------------------------------------------------------------------------------------------------------------  -->
				<section id="Category">

						<div class="container">

								<!-- Header -->
								<div class="row">

										<div class="col-lg-12">

												<div class="header d_flex justify-content-center">

                                                    <h3 class="fs-1">Offer Products</h3>

												</div>

										</div>

                                        <div class="col-lg-12">

                                            <div class="header d_flex d_justify">

                                                <h3>
                                                    <span>Total Price : <del>৳ {{ number_format($offer->grand_price, 2) }}</del></span>
                                                    <span>Offer Price : ৳ {{ discounted_price($offer->grand_price, $offer->discount) }}</span>
                                                </h3>

                                                <a class="btn btn-dark" href="javascript:;" onclick="buyNow({{ $offer->id }}, true)">Buy Now</a>

                                            </div>

                                        </div>

								</div>

								<!-- Category Content-->
								<div class="category_content">

										<div class="row">

                                            @php
                                                $products = \App\Models\Product::whereIn('id', json_decode($offer->products))->get();
                                            @endphp
											<!-- item -->

                                            @foreach ($products as $product)


                                            <div class="col-lg-3 col-sm-4">

                                                    <div class="category_item">

                                                            <a href="categort_details.html">
                                                                    <div class="img">
                                                                        <img src="{{ uploaded_asset($product->thumbnail) }}" class="img-fluid w-100" alt="">
                                                                    </div>

                                                            </a>

                                                            <div class="text">
                                                                    <h3 class="wh">{{ $product->name }}</h3>
                                                                    <p class="wh">

                                                                        <del>৳ {{ number_format($product->price, 2) }}</del> ৳ {{ number_format(($product->price - $product->discount), 2) }}

                                                                    </p>

                                                                    <div class="add_to_cart d_flex justify-content-center">
                                                                        <a href="{{ route('product_details', $product->slug) }}">View More</a>
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

		</div>
@endsection
