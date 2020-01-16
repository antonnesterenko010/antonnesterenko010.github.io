$(document).ready(function () {
  $('.slider-list').slick({
    // autoplay: true,
    autoplaySpeed: 4000,
    fade: true,
    cssEase: 'linear',
    prevArrow: ('.slider-arrows__left'),
    nextArrow: ('.slider-arrows__right'),
  });
});