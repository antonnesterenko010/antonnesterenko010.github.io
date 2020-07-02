$('.main-item').click(function(){
  $(this).toggleClass('active');
  $('.main-item-block').toggleClass('active');
  
})
$('.search-icon').click(function(){
  $('.search-block').toggleClass('active');
})
function formatState(state) {
  if (!state.id) {
    return state.text;
  }
  var baseUrl = "img";
  var $state = $(
    '<span><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
  );
  return $state;
};

$(".search-select").select2({
  templateResult: formatState
});
$('.slider').slick({
    fade: true,
    dots: true, 
    // slidesToShow: 2,
    // slidesToScroll: 2,
    dotsClass: 'slider-dots',
    appendDots: '.slider-nav',
    prevArrow: '.slider-arrow-l',
    nextArrow: '.slider-arrow-r',
    customPaging: function (slider, i) {
      var thumb = $(slider.$slides[i]).data();
      return '<button type="button" class="button slick-dots-btn">' + ('0' + (i + 1)).slice(-2) + '</button>';
    }
})
$('.burger-btn').click(function(event){
  event.preventDefault();
  $(this).toggleClass('active');
  $('.header').toggleClass('active');
})

$('.categories-list .categories-btn').click(function () {
  var popup_data = $(this).data('popup');
  $('.categories-popup-' + popup_data).fadeIn();

  $('.categories-popup-' + popup_data).css('display', 'flex');
});
$(document).mouseup(function (e) {
  var close = $('.categories-popup');
  if (e.target != close[0] && close.has(e.target).length === 0) {
    $('.categories-popup').fadeOut();
  };
  $('body').keydown(function (event) {
    if (event.which == 27) {
      $('.categories-popup').fadeOut();
    }
  });
});