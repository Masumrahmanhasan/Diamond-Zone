@extends('layouts.app')

@section('content')
<section id="banner">

    <div class="owl-carousel owl-theme">

        <!-- Item -->
        <div class="item">
            <div class="banner_img">
                <a href="">
                    <img src="frontend_asset/images/banner.jpg" class="img-fluid w-100" alt="">
                </a>
            </div>
        </div>

        <!-- Item -->
        <div class="item">
            <div class="banner_img">
                <a href="">
                    <img src="frontend_asset/images/banner.jpg" class="img-fluid w-100" alt="">
                </a>
            </div>
        </div>

        <!-- Item -->
        <div class="item">
            <div class="banner_img">
                <a href="">
                    <img src="frontend_asset/images/banner.jpg" class="img-fluid w-100" alt="">
                </a>
            </div>
        </div>

    </div>



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
