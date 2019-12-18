$(document).ready(function () {
  // float scroll
  $('a[href^="#"]').click(function () {
    var target = $(this).attr('href');
    $('html, body').animate({
      scrollTop: $(target).offset().top
    }, 1500);
  });
  // slick slider init
    $('.product-slider-main').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.product-slider'
    });
  $('.product-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.product-slider-main',
    arrows: true,
    prevArrow: ('.product-arrows-left'),
    nextArrow: ('.product-arrows-right'),
    centerMode: true,
    focusOnSelect: true
  }),
  $('.bestseller-slider').slick({
    slidesToShow: 5,
    slidesToScroll: 3,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
  })
  // fixed menu init
  $('.greetings-list__button').click(function(){
    $(this).toggleClass('greetings-list__button-active');
    $('.greetings-list').toggleClass('greetings-list__active');
  })
  // modal form init
  $('.navbar-button').click(function(){
    $('.modal').fadeIn();
  })
  // button-close init
  $('.button-close').click(function(){
    $('.modal').fadeOut();
  })
  $(document).mouseup(function (e) {
  var close = $('.modal-dialog');
  if (e.target != close[0] && close.has(e.target).length === 0) {
    $('.modal').fadeOut();
  };
  $('body').keydown(function (event) {
    if (event.which == 27) {
      $('.modal').fadeOut();
    }
  });
});
// burger menu init
$('.navbar-button__burger').click(function(){
  $(this).toggleClass('navbar-button__burger__active');
  $('.navbar-list__item').toggleClass('navbar-list__item_active');
  $('.navbar-list').toggleClass('navbar-list_active');
})
})