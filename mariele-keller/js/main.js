$('.burger').click(function(){
  $(this).toggleClass('burger_active');
  $('.header-block').toggleClass('block_active');
  $('.header-wrap-b').toggleClass('header-wrap-b_active');
  $('.header-logo').toggleClass('header-logo_active');
  $('.header-list').toggleClass('logo_disabled');
  $('.menu').toggleClass('menu_active');
})
$('.read-btn').click(function(){
  $('.hero-text-hidden').toggleClass('hero-text_active');
});
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
if ($(window).width() > 991) {
  $('#btn-a-1').addClass('button_active');
  $('.btn-angebot').click(function () {
    $('.btn-angebot').removeClass('button_active');
    $(this).toggleClass('button_active');
    var btn_angebot = $(this).data('angebot');
    $('.block-r-a').hide();
    $('#block-r-a-' + btn_angebot).fadeIn().css('display', 'flex');
  });
}
else {
  $('.btn-angebot').click(function () {
    $(this).toggleClass('button_active');
    var btn_angebot = $(this).data('angebot');
    $('#block-r-a-' + btn_angebot).toggleClass('block-r-a-resp_active');
    // $('#block-r-a-' + btn_angebot).fadeIn();
  });
}

$('.btn-close').click(function () {
  $('.modal').css('display', 'none');
});
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
$('.block-r-link, .block-r-link-2').click(function(event){
  event.preventDefault();
});
// $('a[href^="#"]').click(function () {
//   var target = $(this).attr('href');
//   $('html, body').animate({
//     scrollTop: $(target).offset().top
//   }, 1500);
// });
$('.angebot-popup').click(function(){
  var popup_data = $(this).data('popup');
  $('.modal-' + popup_data).fadeIn();
})
$(document).ready(function () {
  $("#menu , #footer-menu, .hero .block-l").on("click", "a", function (event) {
    event.preventDefault();
    var id = $(this).attr('href'),
      top = $(id).offset().top;
    $('body,html').animate({ scrollTop: top }, 1000);
  });
});
var positions = [],
  currentActive = null,
  links = $('.scroll-to');

$(".anchor").each(function () {
  positions.push({
    top: $(this).position().top - 100,
    a: links.filter('[href="#' + $(this).attr('id') + '"]')
  });
});

positions = positions.reverse();

$(window).on('scroll', function () {
  var winTop = $(window).scrollTop();
  for (var i = 0; i < positions.length; i++) {
    if (positions[i].top < winTop) {
      if (currentActive !== i) {
        currentActive = i;
        links.removeClass('active');
        positions[i].a.addClass("active");
      }
      break;
    }
  }
});