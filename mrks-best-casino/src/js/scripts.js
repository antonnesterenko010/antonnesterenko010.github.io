$('.header-burger').on('click', function (e) {
  e.preventDefault;
  $(this).toggleClass('header-burger_active');
});
$('.header-search').click(function(e){
  e.preventDefault;
  $('.header-search__input').toggleClass('header-search__input_active');
  $('.header-search__span').toggleClass('header-search__span_active');
});
$('.header-search__span').click(function(e){
  e.preventDefault;
  $('.header-search__span').removeClass('header-search__span_active');
  $('.header-search__input').removeClass('header-search__input_active');
});