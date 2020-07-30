$('.games-btn').click(function(){
  $('.games-btn').removeClass('active');
  $(this).toggleClass('active');
  $('.button-border').removeClass('disabled');
  $(this).parent().addClass('disabled');
})
$('.modal-window .close-btn').click(function(){
  $('.modal-window').fadeOut();
})