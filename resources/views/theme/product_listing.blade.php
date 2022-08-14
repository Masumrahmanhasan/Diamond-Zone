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
								<h2 class="wh">Shop</h2>
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

												<div class="header d_flex d_justify">

														<p>Showing {{ $shop_products->count() }} results Sort by latest Sale!</p>

														<!-- Filter -->
														<div class="filter">

																<select name="">

																		<option value="">Short by latest</option>
																		<option value="">Short by popularity</option>
																		<option value="">Short by avarage rating</option>

																</select>

														</div>

												</div>

										</div>

								</div>

								<!-- Category Content-->
								<div class="category_content">

										<div class="row">

												@foreach ($shop_products as $product)
														<!-- item -->
														<div class="col-lg-3 col-6">

																<div class="category_item">

																		<a href="{{ route('product_details', $product->slug) }}">
																				<div class="img">
																						<img src="{{ uploaded_asset($product->thumbnail) ?? asset('frontend_asset/images/category_item1.png') }}" class="img-fluid w-100" alt="">
																				</div>

																		</a>

																		<div class="text">
																				<h3 class="wh">{{ $product->name }}</h3>
																				<p class="wh">

                                                                                    @if($product->discount != 0)
                                                                                    <del>৳ {{ number_format($product->price, 2) }}</del> ৳ {{ number_format(($product->price - $product->discount), 2) }}
                                                                                    @else
                                                                                    ৳ {{ number_format($product->price, 2) }}
                                                                                    @endif
                                                                                </p>

																				<div class="add_to_cart d_flex d_justify">
																						<a href="{{ route('product_details', $product->slug) }}">View More</a>
																						<a href="javascript:;" onclick="buyNow({{ $product }}, false)">Order Now</a>
																				</div>

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
