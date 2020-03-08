
$('.header-menu__btn').click(function(e) {
  e.preventDefault;
  $(this).toggleClass('header-menu__btn_active');
  $('.menu-section').toggleClass('menu-section_active').fadeToggle();
  $('.header-logo').toggleClass('header-logo_active')(function () {
    $('.header-logo').css('position', 'fixed').
      css('left', '750px').
      css('z-index', '5').
      css('display', 'block');
  }, function () {
    $('.header-logo').css('position', '').css('left', '750px');
  });
  // $('.header-menu__btn').css('right', '230px')
  // $('.header-menu__btn').css('position', 'fixed').css('right', '225px');
});

// if ($('#header-menu__btn').hasClass('header-menu__btn_active')){
//   $('header-logo').css('position', 'fixed');

//   $('header-logo').css('left', '750px');
// }
// $(function() {
//   menu_top = $('.header-menu').offset().top;      
//   $(window).scroll(function () {             
//     if ($(window).scrollTop() > menu_top ) {  
//       if ($('.header-menu').css('position') != 'fixed') {  
//         $('.header-menu').addClass('header-menu_active');

//         $('.header-menu').css('position','fixed');  
//         $('.header-menu').css('top', '0');
//         $('.header-menu').css('width', '100%');
//         $('.header-menu').css('background', 'rgba(0,0,0,0.7)')
//         $('.header-menu').css('padding-top', '20px'); 
//         $('.header-logo').css('position', 'fixed');  
//         $('.header-logo').css('left', '230px');

//         // $('.header-logo__name').removeClass('header-logo__name');
//         // $('.header-logo__name').addClass('header-logo__name_active');
//         $('.header-logo__name').css('display', 'block');
//         $('.header-logo__name').css('position', 'fixed');
//         $('.header-logo__name').css('top', '30px');
//         $('.header-logo__name').css('left', '290px');
//         $('.header-menu__btn').css('right', '-1265px');
//       }
//     } else {                                 
//       if ($('.header-menu').css('position') == 'fixed') {  
//         $('.header-menu').css('position','');
//         $('.header-menu').css('width', '');
//         $('.header-menu').css('background', 'rgba(0,0,0,0.0)')
//         $('.header-menu').css('top', '');
//         $('.header-logo').css('position', '');  
//         // $('.header-logo').css('left', '0px');
//         $('.header-menu__btn').css('right', '');
//         $('.header-logo__name').css('display', 'none');
        
//       }
//       // if ($('.header-menu__btn').toggleClass('header-menu__btn_active')){
//       //   $('.header-logo').css('position', 'fixed').css('left', '750px')

//       // }
//     }
    
//   });
// });
$(function () {
  menu_top = $('.header-menu').offset().top;
  $(window).scroll(function () {
    if ($(window).scrollTop() > menu_top) {
      $('.header-menu').addClass('header-menu_active');
      $('.header-logo__name').addClass('header-logo__name_active');
      $('.header-menu__name').addClass('header-menu__name_active');

    } else {
      $('.header-menu').removeClass('header-menu_active');
      $('.header-logo__name').removeClass('header-logo__name_active');
      $('.header-menu__name').removeClass('header-menu__name_active');



    }

  });
});
$(document).ready(function(){

  $('.slider-block').slick({
    arrows: false,
    dots: true,
    dotsClass: 'slider-dots'
  })
})