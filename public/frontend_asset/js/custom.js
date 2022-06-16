$(function() {

    // Preloader


    $(window).on('load',function(){
        $('.preloader').delay(100).fadeOut(100);
    });


    // Back to Top

    var btn = $('.backToTop');

    $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
        btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
    });

    btn.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '300');
    });


    // Menu Stivky
    $(window).scroll(function(){
        if($(this).scrollTop() > 100){
            $('.navbar').addClass('sticky')
        } else{
            $('.navbar').removeClass('sticky')
        }
    });

    // Banner Slider
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        items:1,
        nav:false,
        dots:true,
        autoPlay: true,
    })



});
