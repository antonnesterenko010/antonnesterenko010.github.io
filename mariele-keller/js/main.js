$('.burger').click(function(){
  $(this).toggleClass('burger_active');
  $('.header-block').toggleClass('block_active');
  $('.header-wrap-b').toggleClass('header-wrap-b_active');
  $('.header-logo').toggleClass('header-logo_active');
  $('.header-list').toggleClass('logo_disabled');
  $('.menu').toggleClass('menu_active');
})