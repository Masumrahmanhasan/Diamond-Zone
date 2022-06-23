@extends('layouts.app')

@section('content')
<section id="banner">


    @if (get_setting('home_slider_images') != null)
    @php $slider_images = json_decode(get_setting('home_slider_images'), true);  @endphp
    <div class="owl-carousel owl-theme">

        <!-- Item -->
        @foreach ($slider_images as $key => $value)
        <div class="item">
            <div class="banner_img">
                <a href="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
                    <img src="{{ uploaded_asset($slider_images[$key]) }}" class="img-fluid w-100" alt="">
                </a>
            </div>
        </div>
        @endforeach

    </div>

    @endif


</section>



<div class="section_gaps"></div>

@include('theme.includes.category_section')

<div class="section_gaps"></div>

@include('theme.includes.best_seller_section')

<div class="section_gaps"></div>

@include('theme.includes.combo_offer_section')

<div class="section_gaps"></div>

@include('theme.includes.customer_review_section')

<div class="section_gaps"></div>

@include('theme.includes.photo_review_section')

<div class="section_gaps"></div>

@include('theme.includes.video_section')

<div class="section_gaps"></div>

@include('theme.includes.social_media_section')


@endsection
