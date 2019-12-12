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