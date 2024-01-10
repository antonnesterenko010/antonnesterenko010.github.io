"use strict";

(function ($) {
  // companies slider (real-time-data info section)

  $('.js-three-slides-autoplay').slick({
    dots: false,
    infinite: true,
    speed: 500,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: false,
    nextArrow: false,
    adaptiveHeight: true,
    responsive: [{
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }]
  });
  $(document).ready(function () {
    // mobile sliders
    $('.js-solutions-slider').slick({
      cssEase: 'linear',
      arrows: false,
      dots: false,
      infinite: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      mobileFirst: true,
      responsive: [{
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
          dots: false
        }
      }, {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          dots: true
        }
      }, {
        breakpoint: 1,
        settings: {
          slidesToShow: 1.1,
          dots: true
        }
      }]
    });
  });
})(jQuery);