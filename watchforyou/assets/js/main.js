// preloader init
document.body.onload = function(){
  setTimeout( function(){
    var preloader = document.getElementById('page-preloader');
    if ( !preloader.classList.contains('done') ){
      preloader.classList.add('done');
    }
  }, 1000)
}
// jquery masked input 
jQuery(function ($) {
  $(".form__input__tel").mask("+38 (999) 999-99-99");
});
$(document).ready(function () {
  // float scroll
  $('a[href^="#"]').click(function () {
    var target = $(this).attr('href');
    $('html, body').animate({
      scrollTop: $(target).offset().top
    }, 1500);
  });
  // backtop scroll init
  $("#back-top").hide();
  $(function () {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        $('#back-top').fadeIn();
      } else {
        $('#back-top').fadeOut();
      }
    });
  $('#back-top a').click(function () {
    $('body,html').animate({
      scrollTop: 0
    }, 800);
    return false;
});
    });


  // slick slider init
    $('.product-slider-main').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.product-slider'
    });
  $('.product-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.product-slider-main',
    arrows: true,
    prevArrow: ('.product-arrows-left'),
    nextArrow: ('.product-arrows-right'),
    centerMode: true,
    focusOnSelect: true
  }),
  $('.offer-slider').slick({
    autoplay: true,
    arrows: true
  }),
  $('.bestseller-slider').slick({
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    responsive: [
      {
        breakpoint: 786,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 1050,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 1350,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 3000,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 3
        }
      },
      
    ]
  })
  // fixed menu init
  $('.sidebar-button').click(function(){
    $(this).toggleClass('sidebar-button_active');
    $('.sidebar-list').toggleClass('sidebar-list_active');
  })
  // if arrows hidden - use margin
  if ($('.slick-arrow.slick-hidden').css('display') == 'none') {
    $('.product-arrows').css('margin-right', '50px');
  } 
  // modal form init
  $('.navbar-button, .product-price__button, .product-price__links__button, .recall-button').click(function(){
    $('.modal').fadeIn();
  });
  // button-close init
  $('.modal-dialog__close').click(function(){
    $('.modal').fadeOut();
  });
  $('.modalty-dialog__close').click(function () {
    $('.modalty').fadeOut();
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
$(document).mouseup(function (e) {
  var close = $('.modalty-dialog');
  if (e.target != close[0] && close.has(e.target).length === 0) {
    $('.modalty').fadeOut();
  };
});
// burger menu init
$('.navbar-button__burger').click(function(){
  $(this).toggleClass('navbar-button__burger__active');
  $('.navbar-list__item').toggleClass('navbar-list__item_active');
  $('.navbar-list').toggleClass('navbar-list_active');
});
// jquery validate init
$("#modal-form").validate({
    rules: {
      user_name: {
        required: true
      },
      user_tel: {
        required: true
      }
    },
    messages: {
      user_name: {
        required: "Пожалуйста, укажите ваше имя"
      },
      user_tel: {
        required: "Для связи с вами нам необходим ваш мобильный номер!"
      }
    },
    submitHandler: function (form) {
      $.ajax({
        url: 'mail.php',
        type: 'POST',
        data: $('#modal-form').serialize(),
        success: function (data) {
          $('form input[type="text"], form textarea').val('');
          $('.modalty').fadeIn();
        }
      })
    }
  });
$("#main-form").validate({
  rules: {
    user_name: {
      required: true
    },
    user_tel: {
      required: true
    },
    user_email: {
      email: true,
    }
  },
  messages: {
    user_name: {
      required: "Пожалуйста, укажите ваше имя"
    },
    user_tel: {
      required: "Введите корректный номер!"
    },
    user_email: {
      email: "Пожалуйста введите корректный e-mail"
    }
  },
  submitHandler: function (form) {
    $.ajax({
      url: 'mail.php',
      type: 'POST',
      data: $('#main-form').serialize(),
      success: function (data) {
        $('form input[type="text"], form textarea').val('');
        $('.modalty').fadeIn();
      }
    })
  },
});
$("#contact-form").validate({
  rules: {
    user_name: {
      required: true
    },
    user_tel: {
      required: true
    },
    user_email: {
      email: true,
    }
  },
  messages: {
    user_name: {
      required: "Пожалуйста, укажите ваше имя"
    },
    user_tel: {
      required: "Введите корректный номер!"
    },
    user_email: {
      email: "Пожалуйста введите корректный e-mail"
    }
  },
  submitHandler: function (form) {
    $.ajax({
      url: '../mail.php',
      type: 'POST',
      data: $('#contact-form').serialize(),
      success: function (data) {
        $('form input[type="text"], form textarea').val('');
        $('.modalty').fadeIn();
      }
    })
  },
});
$("#product-form").validate({
  rules: {
    user_tel: {
      required: true
    }
  },
  messages: {
    user_tel: {
      required: "Для связи с вами нам необходим ваш мобильный номер!"
    }
  },
  submitHandler: function (form) {
    $.ajax({
      url: 'mail.php',
      type: 'POST',
      data: $('#product-form').serialize(),
      success: function (data) {
        $('form input[type="text"], form textarea').val('');
        $('.modalty').fadeIn();
      }
    })
  }
});
})
