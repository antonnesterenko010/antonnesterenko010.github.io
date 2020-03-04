$('.header-menu__btn').click(function(e) {
  e.preventDefault;
  $(this).toggleClass('header-menu__btn_active');
  $('.menu-section').toggleClass('menu-section_active').fadeToggle();
  // $('.header-logo').css('position', 'fixed').css('left', '750px');
  // $('.header-menu__btn').css('right', '230px')
  // $('.header-menu__btn').css('position', 'fixed').css('right', '225px');
});

$(function() {
  menu_top = $('.header-menu').offset().top;      
  $(window).scroll(function () {             
    if ($(window).scrollTop() > menu_top ) {  
      if ($('.header-menu').css('position') != 'fixed') {  
        $('.header-menu').addClass('header-menu_active');
        $('.header-menu').css('position','fixed');  
        $('.header-menu').css('top', '0');
        $('.header-menu').css('width', '100%');
        $('.header-menu').css('background', 'rgba(0,0,0,0.7)')
        $('.header-menu').css('padding-top', '20px'); 
        $('.header-logo').css('position', 'fixed');  
        $('.header-logo').css('left', '230px');
        $('.header-menu__btn').css('right', '-1265px');
      }
    } else {                                 
      if ($('.header-menu').css('position') == 'fixed') {  
        $('.header-menu').css('position','');
        $('.header-menu').css('width', '');
        $('.header-menu').css('background', 'rgba(0,0,0,0.0)')
        $('.header-menu').css('top', '');
        $('.header-logo').css('position', '');  
        $('.header-logo').css('left', '0px');
        $('.header-menu__btn').css('right', '');
      }
    }
  });
});