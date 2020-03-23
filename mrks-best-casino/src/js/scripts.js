$('.header-burger').on('click', function (e) {
  e.preventDefault();
  $(this).toggleClass('header-burger_active');
});
$('.header-search').click(function(e){
  e.preventDefault();
  $(this).toggleClass('header-search_active');
  $('.header-search__input').toggleClass('header-search__input_active');
  $('.header-search__close').toggleClass('header-search__close_active');
  $('.search-wrap').toggleClass('search-wrap_active');
  $('.header-search__2').toggleClass('header-search__2_active');
});
$('.header-search__close').click(function(e){
  e.preventDefault();
  $('.header-search__close').removeClass('header-search__close_active');
  $('.header-search').removeClass('header-search_active');
  $('.header-search__input').removeClass('header-search__input_active');
});