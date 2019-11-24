$(document).ready(function () {
  // float scroll
  $('a[href^="#"]').click(function () {
    var target = $(this).attr('href');
    $('html, body').animate({
      scrollTop: $(target).offset().top
    }, 1500);
  });
  // slick slider init
  $('.offer-slider').slick({
    autoplay: true,
    dots: true,
    arrows: true,
    prevArrow: ('.arrows-left'),
    nextArrow: ('.arrows-right')
  })
  $('.greetings-list__button').click(function(){
    $('.greetings-list').toggle('.greetings-list__active');
  })
})