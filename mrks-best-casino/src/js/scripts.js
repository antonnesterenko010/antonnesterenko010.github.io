$('.header-burger').on('click', function (e) {
  e.preventDefault;
  $(this).toggleClass('header-burger_active');
});
$('.header-search').click(function(e){
  e.preventDefault;
  $(this).toggleClass('header-search_active');
  $('.header-search__input').toggleClass('header-search__input_active');
  $('.header-search__span').toggleClass('header-search__span_active');
  $('.search-wrap').toggleClass('search-wrap_active');
  $('.header-search__2').toggleClass('header-search__2_active');
});
$('.header-search__span').click(function(e){
  e.preventDefault;
  $(this).removeClass('header-search__span_active');
  $('.header-search').removeClass('header-search_active');
  $('.header-search__input').removeClass('header-search__input_active');
});