<footer id="footer">

    <div class="container">

        <div class="row">

            <!-- Item -->
            <div class="col-lg-4 col-sm-4">

                <div class="footer_content">
                    <h3 class="wh">Look on Us</h3>
                    <p class="wh">{{ get_setting('about_us_description') }}</p>
                </div>

            </div>

            <!-- Item -->
            <div class="col-lg-4 col-sm-4">

                <div class="footer_content">
                    <h3 class="wh">{{ get_setting('widget_one') }}</h3>
                    @if ( get_setting('widget_one_labels') !=  null )
                        <ul>
                            @foreach (json_decode( get_setting('widget_one_labels')) as $key => $value)
                            <li><a href="{{ json_decode( get_setting('widget_one_links'), true)[$key] }}"> {{ $value }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>

            </div>

            <!-- Item -->
            <div class="col-lg-4 col-sm-4">

                <div class="footer_content">
                    <h3 class="wh">{{ get_setting('widget_two') }}</h3>
                    @if ( get_setting('widget_two_labels') !=  null )
                        <ul>
                            @foreach (json_decode( get_setting('widget_two_labels')) as $key => $value)
                            <li><a href="{{ json_decode( get_setting('widget_two_links'), true)[$key] }}"> {{ $value }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>

            </div>

        </div>

    </div>

</footer>

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START Tiny Footer PART
---------------------------------------------------------------------------------------------------------------------------------------------------  -->
<footer id="tiny_footer">

    <div class="container">

        <div class="row d_flex">

            <!-- left -->
            <div class="col-lg-6 col-sm-6">

                <div class="tiny_footer_left">
                    <h3 class="wh">PAYMENT METHODES</h3>
                    <div class="img">
                        <img src="{{ asset('frontend_asset/images/footer_left') }}" alt="">
                    </div>
                </div>

            </div>

            <!-- left -->
            <div class="col-lg-6 col-sm-6">

                <div class="tiny_footer_left">
                    <h3 class="wh">SHIPPING SYSTEMS</h3>
                    <div class="img">
                        <img src="{{ asset('frontend_asset/images/footer_right') }}" class="img-fluid" alt="">
                    </div>
                </div>

            </div>

        </div>

    </div>

</footer>
