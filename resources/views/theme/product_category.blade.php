@extends('layouts.app')
@section('styles')
    <style>
        :root {
            --smaller: .75;
        }

        #countdown {

            position: absolute;
            top: 25%;
            left: 50%;
            color: #ffffff;
            font-weight: 800;
            z-index: 1;
            font-size: 20px;
            transform: translate(-50%, -50%);

        }
        li {
            display: inline-block;
            font-size: 1.5em;
            list-style-type: none;
            padding: 1em;
            text-transform: uppercase;
        }

        li span {
            display: block;
            font-size: 4.5rem;
        }

        .emoji {
            display: none;
            padding: 1rem;
        }

        .emoji span {
            font-size: 4rem;
            padding: 0 .5rem;
        }

        @media all and (max-width: 768px) {
            h1 {
                font-size: calc(1.5rem * var(--smaller));
            }

            li {
                font-size: calc(1.125rem * var(--smaller));
            }

            li span {
                font-size: calc(3.375rem * var(--smaller));
            }
        }
    </style>

@endsection
@section('content')
		<div class="category_page">


				<section id="banner">

						<div class="banner_img">
								<a href="">
										<img src="{{ asset('frontend_asset/images/category_banner.jpg') }}" class="img-fluid w-100" alt="">
								</a>
						</div>

                        <div id="countdown" data-id="{{ $category->count_down }}">
                            <ul>
                                <li><span id="days"></span>days</li>
                                <li><span id="hours"></span>Hours</li>
                                <li><span id="minutes"></span>Minutes</li>
                                <li><span id="seconds"></span>Seconds</li>
                            </ul>
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
																						<a href="javascript:;" onclick="buyNow({{ $product->id }}, false)">Order Now</a>
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

@section('scripts')

    <script>
        (function () {
            const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;


            let today = new Date(),
                dd = String(today.getDate()).padStart(2, "0"),
                mm = String(today.getMonth() + 1).padStart(2, "0"),
                yyyy = today.getFullYear(),
                nextYear = yyyy + 1;
            let count_down = document.getElementById('countdown').getAttribute('data-id')


            today = mm + "/" + dd + "/" + yyyy;
            if (today > count_down) {
                count_down = dayMonth + nextYear;
            }
            //end

            const countDown = new Date(count_down).getTime(),
                x = setInterval(function() {

                    const now = new Date().getTime(),
                        distance = countDown - now;

                    document.getElementById("days").innerText = Math.floor(distance / (day)),
                        document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                        document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                        document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

                    if (distance < 0) {
                        document.getElementById("days").innerText = '00',
                            document.getElementById("hours").innerText = '00',
                            document.getElementById("minutes").innerText = '00',
                            document.getElementById("seconds").innerText = '00',
                        clearInterval(x);
                    }

                }, 0)
        }());
    </script>

@endsection
