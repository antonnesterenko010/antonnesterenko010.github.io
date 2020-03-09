
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
 
});

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

$('a[href^="#"]').click(function () {
  var target = $(this).attr('href');

  $('.header-menu__btn').removeClass('header-menu__btn_active');

  $('.header-logo').removeClass('header-logo_active');
  $('.menu-section').fadeOut();
  $('html, body').animate({
    scrollTop: $(target).offset().top
  }, 1500);
});

$('.stats-section').hover(function () {
  $('.stats-item__counter').each(function () {
    $(this).prop('Counter', 0).animate({
      Counter: $(this).text().replace(',', '')
    }, {
      duration: 1500,
      easing: 'swing',
      step: function (now) {
        $(this).text(Math.ceil(now).toLocaleString('en'));
      },

    });
  });
}, function () {
  
});
// $(function () {
//   menu_stats = $('.hero-section').offset().top;
//   $(window).scroll(function () {
//     if ($(window).scrollTop() > menu_stats) {


//       $('.stats-item__counter').each(function () {
//         $(this).prop('Counter', 0).animate({
//           Counter: $(this).text().replace(',', '')
//         }, {
//           duration: 1500,
//           easing: 'swing',
//           step: function (now) {
//             $(this).text(Math.ceil(now).toLocaleString('en'));
//           },

//         });
//       });


//     } else {
//       $('.stats-item__counter').show();
//     }

//   });
// });
$(document).mouseup(function (e) {
  $('body').keydown(function (event) {
    if (event.which == 27) {

      $('.header-menu__btn').removeClass('header-menu__btn_active');

      $('.header-logo').removeClass('header-logo_active');
      $('.menu-section').fadeOut();
    }
  });
});
$('input[name="phone"]').mask("+99 (999) 999-9999");
$("#contact-form").validate({
  rules: {
    name: {
      required: true
    },
    
    email: {
      required: true,
      email: true
    },
    phone: {
      required: true
    },
  },
  messages: {
    name: {
      required: "Please, enter your name"
    },

    email: {
      required: "Please, enter your email",
      email: "Please, enter valid e-mail"
    },
    phone: {
      required: "Please, enter your phone number"
    }
  },
  submitHandler: function (form) {
    $.ajax({
      url: 'mail.php',
      type: 'POST',
      data: $('#contact-form').serialize(),
      success: function (data) {
        $('form input[type="text"], form textarea').val('');
        alert('Thank you for sending your information!<br> We will contact you soon!');
      },
    })
  },
  invalidHandler: function (form) {
    $.ajax({
      success: function (data) {
        $('input[name="name"]').css('border', '1px solid #E81B44');
        $('input[name="email"]').css('border', '1px solid #E81B44');
        $('input[name="phone"]').css('border', '1px solid #E81B44');
      }
    })
  }
})