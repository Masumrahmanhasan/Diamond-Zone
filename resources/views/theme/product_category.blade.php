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
								<h2 class="wh">{{ $category->name }}</h2>
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

														<p>Showing 1–16 of 43 results Sort by latest Sale!</p>

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

												@foreach ($category->products as $product)
														<!-- item -->
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

                                                                                    @if($product->discount != 0)
                                                                                    <del>৳ {{ number_format($product->price, 2) }}</del> ৳ {{ number_format(($product->price - $product->discount), 2) }}
                                                                                    @endif
                                                                                </p>

																				<div class="add_to_cart d_flex d_justify">
																						<a href="{{ route('product_details', $product->slug) }}">View More</a>
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

		</div>
@endsection
