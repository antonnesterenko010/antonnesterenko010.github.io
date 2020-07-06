$('.header-btn').click(function (event) {
  // event.preventDefault();
  $('.burger').toggleClass('active');
  $('.header').toggleClass('active');
  $('.hero').toggleClass('active');
  $('.header.fixed .header-t').toggleClass('active');
  $('.header-logo .text').toggleClass('disabled');
  $('body').toggleClass('overflow-hidden');
})
$(function () {
  menu_top = $('.header-t').offset().top;
  $(window).scroll(function () {
    if ($(window).scrollTop() > menu_top) {
      $('.header').addClass('fixed');
      $('.hero').addClass('fixed');
    } else {
      $('.header').removeClass('fixed');
      $('.hero').removeClass('fixed');
    }

  });
});
$('.slider-block').slick({
  arrows: false,
  dots: true,
  dotsClass: 'slider-dots',
});