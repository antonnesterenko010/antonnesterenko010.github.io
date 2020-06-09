$('.burger').click(function(){
  $(this).toggleClass('burger_active');
  $('.header-block').toggleClass('block_active');
  $('.header-wrap-b').toggleClass('header-wrap-b_active');
  $('.header-logo').toggleClass('header-logo_active');
  $('.header-list').toggleClass('logo_disabled');
  $('.menu').toggleClass('menu_active');
})
$('#btn-2, #btn-3, #btn-4, #btn-5').click(function(){
  $('.button').removeClass('button_active');
  $(this).addClass('button_active');
});
$('.button').click(function () {
  $('.button').removeClass('button_active');
  $(this).addClass('button_active');
  var btn_num = $(this).attr('id');
  $('.block-r-0').hide();
  btn_num = btn_num.substr(-1);
  $('#block-r-' + btn_num).fadeIn();
  console.log('#block-r-' + btn_num);
});