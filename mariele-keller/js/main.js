$('.burger').click(function(){
  $(this).toggleClass('burger_active');
  $('.header-block').toggleClass('block_active');
  $('.header-wrap-b').toggleClass('header-wrap-b_active');
  $('.header-logo').toggleClass('header-logo_active');
  $('.header-list').toggleClass('logo_disabled');
  $('.menu').toggleClass('menu_active');
})

if ($(window).width() > 991) {
  $('#btn-1').addClass('button_active');
  $('.button').click(function () {
    $('.button').removeClass('button_active');
    $(this).toggleClass('button_active');
    var btn_num = $(this).data('number');
    $('.block-r-0').hide();
    $('#block-r-' + btn_num).fadeIn();
  });
} 
else {
  $('.button').click(function () {
    $(this).toggleClass('button_active');
    var btn_num = $(this).data('number');
    $('#block-r-' + btn_num + '-resp').toggleClass('block-resp_active');
    
    $('#block-r-' + btn_num).fadeIn();
  });
    }