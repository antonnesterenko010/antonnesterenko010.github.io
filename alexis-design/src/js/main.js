$(document).ready(function () { //строка для того чтобы вставленный код работал в main.js
  // WoW Animate inizialization
  wow = new WOW(
  {
    mobile: true, // default
    live: true // default
  }
  )
  wow.init();
  // burger menu inizialization
  // if (window.matchMedia('(max-width: 768px)').matches) {
  //   $('.menu-btn').on('click', function (e) {
  //     e.preventDefault;
  //     $(this).toggleClass('menu-btn_active');
  //     $('.navbar-menu__item').toggleClass('navbar-menu__item_active');
  //     $('.navbar').toggleClass('navbar_active');
  //   });
  // }
  $('.menu-btn').click(function (e){
    e.preventDefault;
    $(this).toggleClass('menu-btn_active');
    $('.navbar-menu__item').toggleClass('navbar-menu__item_active');
    $('.navbar').toggleClass('navbar_active');
  });
  // Slider inizialization
  $('.comment-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    // autoplay: true,
    autoplaySpeed: 2000,
    arrows: false,
    dots: true,
    dotsClass: 'dots-style',
    infinite: true,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      }
    ]
  });
  // $('.background').click(function(){
  //   $('.subtitle').fadeOut();
  // });
  // $('.background').hasClass('comment-background')(function(){
  //   $('.background').click(function () {
  //     $('.subtitle').fadeOut();
  //   });
  // })
  // $('.subtitle').hide($('.slick-dots li:eq(3)').hasClass('slick-active'));
  // $('.subtitle').hide($('.background').hasClass('comment-background'));
  // $('.comment-dots__default').prepend($('<img>', {
  //   src: 'img/comment/dot-active.png'
  // }))($('.background').hasClass('comment-background'));
  // $(".background").hover( function () {
  //   $('.subtitle').fadeOut();
  // })

  // $('.something:eq(0)').attr('src', function (i, e) {
  //   return e.replace("img/comment/dot.png", "img/comment/dot-active.png");
  // })


  // float scroll
  $('a[href^="#"]').click(function () {
    var target = $(this).attr('href');
    $('html, body').animate({
      scrollTop: $(target).offset().top
    }, 1500);
  });
  // video play inizialization
  $('#video-play').click(function () {
    $('.play-button').hide(1000, function () {
      var dataYoutube = $('#video-play').parents('.video-block').attr('data-youtube');
      $('#video-play').parents('.video-block').html('<iframe width="100%" height="500" src="https://www.youtube.com/embed/' + dataYoutube + '?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>')
    });
  });
  // team description inizialization
  $('.team-card:eq(0)').hover(function () {
      $('.team-description, .team-description__orange, .team-description__triangle:eq(0)').fadeIn();
    }, function () {
      $('.team-description, .team-description__orange, .team-description__triangle:eq(0)').hide();
    }),
    $('.team-card:eq(1)').hover(function () {
      $('.team-description, .team-description__green, .team-description__triangle:eq(1)').fadeIn();
    }, function () {
      $('.team-description, .team-description__green, .team-description__triangle:eq(1)').hide();
    }),
    $('.team-card:eq(2)').hover(function () {
      $('.team-description, .team-description__violet, .team-description__triangle:eq(2)').fadeIn();
    }, function () {
      $('.team-description, .team-description__violet, .team-description__triangle:eq(2)').hide();
    }),
    $('.team-card:eq(3)').hover(function () {
      $('.team-description, .team-description__yellow, .team-description__triangle:eq(3)').fadeIn();
    }, function () {
      $('.team-description, .team-description__yellow, .team-description__triangle:eq(3)').hide();
    })
});
$(window).on('load resize', function(){
  if(window.innerWidth <=768){
    $('.team-description__triangle').hide();
  }
})
// counter inizialization

$('.team-stats').hover(function () {
  $('.team-stats__item').show();
  $('.team-stats__counter').each(function () {
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
  $('team-stats__item').hide();
});
// modal dialog inizialization
$('#choose-green').click(function () {
    $('.modal').fadeIn(),
      $('.modal-info__green').show(),
      $('.modal-info__orange, .modal-info__purple').hide()
  }),
  $('#choose-orange').click(function () {
    $('.modal').fadeIn(),
      $('.modal-info__orange').show(),
      $('.modal-info__green, .modal-info__purple').hide()
  }),
  $('#choose-purple').click(function () {
    $('.modal').fadeIn(),
      $('.modal-info__purple').show(),
      $('.modal-info__orange, .modal-info__green').hide()
  }),
  $('.modal-dialog__close').click(function () {
    $('.modal').fadeOut();
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

// modal-thankyou dialog inizialization
$('.modal-thankyou__close').click(function () {
  $('.modal2').fadeOut();
});
$(document).mouseup(function (e) {
  var close2 = $('.modal-thankyou');
  if (e.target != close2[0] && close2.has(e.target).length === 0) {
    $('.modal2').fadeOut();
  };
  $('body').keydown(function (event) {
    if (event.which == 27) {
      $('.modal2').fadeOut();
    }
  });
});
// modal-begin dialog inizialization

$('#begin-btn, .portfolio-card__button').click(function () {
  $('.modal3').fadeIn();
});
$('.modal-begin__close').click(function () {
  $('.modal3').fadeOut();
});
$(document).mouseup(function (e) {
  var close3 = $('.modal-begin');
  if (e.target != close3[0] && close3.has(e.target).length === 0) {
    $('.modal3').fadeOut();
  };
  $('body').keydown(function (event) {
    if (event.which == 27) {
      $('.modal3').fadeOut();
    }
  });
});
$('.noLink').click(function (event) {
  event.preventDefault();
});
// form inizialization
// $('#final-form').submit(function (event) {
//   event.preventDefault();
//   var form = $(this);
//   var url = form.attr('action');

//   $.ajax({
//     type: 'POST',
//     url: url,
//     data: form.serialize(),
//     success: function (data) {
//       $('form input[type="text"], form textarea').val('');
//       $('.modal2').fadeIn();
//     },
//     error: function (data) {
//       $('label').addClass('wow, shake');
//     }
//   });
// });
// $('#modal-form').submit(function (event) {
//   event.preventDefault();
//   var form = $(this);
//   var url = form.attr('action');

//   $.ajax({
//     type: 'POST',
//     url: url,
//     data: form.serialize(),
//     success: function (data) {
//       $('form input[type="text"], form textarea').val('');
//       $('.modal2').fadeIn();
//     },
//     error: function (data) {
//       $('label').addClass('wow, shake');
//     }
//   });
// });
// $('#modal3-form').submit(function (event) {
//   event.preventDefault();
//   var form = $(this);
//   var url = form.attr('action');

//   $.ajax({
//     type: 'POST',
//     url: url,
//     data: form.serialize(),
//     success: function (data) {
//       $('form input[type="text"], form textarea').val('');
//       $('.modal2').fadeIn();
//     },
//     error: function (data) {
//       $('label').addClass('wow, shake');
//     }
//   });
// });
// $('#blog-form').submit(function (event) {
//   event.preventDefault();
//   var form = $(this);
//   var url = form.attr('action');

//   $.ajax({
//     type: 'POST',
//     url: url,
//     data: form.serialize(),
//     success: function (data) {
//       $('form input[type="text"], form textarea').val('');
//       $('.modal2').fadeIn();
//     },
//     error: function (data) {
//       $('label').addClass('wow, shake');
//     }
//   });
// });
// form validation
$("#blog-form").validate({
    rules: {
      user_email: {
        required: true,
        email: true
      }
    },
    messages: {
      user_email: {
        required: "Для оформления подписки нам необходим ваш e-mail!",
        email: "Пожалуйста, введите корректный e-mail"
      }
    },
    submitHandler: function (form) {
      $.ajax({
        url: 'mail.php',
        type: 'POST',
        data: $('#blog-form').serialize(),
        success: function (data) {
          $('form input[type="text"], form textarea').val('');
          $('.modal2').fadeIn();
        },
        // error: function (data) {
        // $('.final-title').hide();

        // }
      })
    },
    invalidHandler: function (form) {
      $.ajax({
        success: function (data) {
          $("label").animate({
            "top": "-=5px"
          }, {
            duration: 100
          });
          $("label").animate({
            "top": "+=5px"
          }, {
            duration: 100
          });
          $("label").animate({
            "top": "-=5px"
          }, {
            duration: 100
          });
          $("label").animate({
            "top": "+=5px"
          }, {
            duration: 100
          });
          // $("input:required").css("border-color", "red");
        }
      })
    }
  }),
  $("#final-form").validate({
    rules: {
      user_name: {
        required: true
      },
      user_email: {
        required: true,
        email: true
      }
    },
    messages: {
      user_name: {
        required: "Пожалуйста, укажите ваше имя"
      },
      user_email: {
        required: "Для оформления подписки нам необходим ваш e-mail!",
        email: "Пожалуйста, введите корректный e-mail"
      }
    },
    submitHandler: function (form) {
      $.ajax({
        url: 'mail.php',
        type: 'POST',
        data: $('#final-form').serialize(),
        success: function (data) {
          $('form input[type="text"], form textarea').val('');
          $('.modal2').fadeIn();
        },
        // error: function (data) {
        // $('.final-title').hide();

        // }
      })
    },
    invalidHandler: function (form) {
      $.ajax({
        success: function (data) {
          $("label").animate({
            "top": "-=5px"
          }, {
            duration: 100
          });
          $("label").animate({
            "top": "+=5px"
          }, {
            duration: 100
          });
          $("label").animate({
            "top": "-=5px"
          }, {
            duration: 100
          });
          $("label").animate({
            "top": "+=5px"
          }, {
            duration: 100
          });
          // $("input:required").css("border-color", "red");
        }
      })
    }
  }),
  $("#modal-form").validate({
    rules: {
      user_name: {
        required: true
      },
      user_email: {
        required: true,
        email: true
      }
    },
    messages: {
      user_name: {
        required: "Пожалуйста, укажите ваше имя"
      },
      user_email: {
        required: "Для связи с вами нам необходим ваш e-mail",
        email: "Пожалуйста, введите корректный e-mail"
      }
    },
    submitHandler: function (form) {
      $.ajax({
        url: 'mail.php',
        type: 'POST',
        data: $('#modal-form').serialize(),
        success: function (data) {
          $('form input[type="text"], form textarea').val('');
          $('.modal2').fadeIn();
        },
        // error: function (data) {
        // $('.final-title').hide();

        // }
      })
    },
    invalidHandler: function (form) {
      $.ajax({
        success: function (data) {
          $("label").animate({
            "top": "-=5px"
          }, {
            duration: 100
          });
          $("label").animate({
            "top": "+=5px"
          }, {
            duration: 100
          });
          $("label").animate({
            "top": "-=5px"
          }, {
            duration: 100
          });
          $("label").animate({
            "top": "+=5px"
          }, {
            duration: 100
          });
          // $("input:required").css("border-color", "red");
        }
      })
    }
  }),
  $("#modal3-form").validate({
    rules: {
      user_name: {
        required: true
      },
      user_email: {
        required: true,
        email: true
      }
    },
    messages: {
      user_name: {
        required: "Пожалуйста, укажите ваше имя"
      },
      user_email: {
        required: "Для связи с вами нам необходим ваш e-mail",
        email: "Пожалуйста, введите корректный e-mail"
      }
    },
    submitHandler: function (form) {
      $.ajax({
        url: 'mail.php',
        type: 'POST',
        data: $('#modal3-form').serialize(),
        success: function (data) {
          $('form input[type="text"], form textarea').val('');
          $('.modal2').fadeIn();
        },
        // error: function (data) {
        // $('.final-title').hide();

        // }
      })
    },
    invalidHandler: function (form) {
      $.ajax({
        success: function (data) {
          $("label").animate({
            "top": "-=5px"
          }, {
            duration: 100
          });
          $("label").animate({
            "top": "+=5px"
          }, {
            duration: 100
          });
          $("label").animate({
            "top": "-=5px"
          }, {
            duration: 100
          });
          $("label").animate({
            "top": "+=5px"
          }, {
            duration: 100
          });
          // $("input:required").css("border-color", "red");
        }
      })
    }
  });