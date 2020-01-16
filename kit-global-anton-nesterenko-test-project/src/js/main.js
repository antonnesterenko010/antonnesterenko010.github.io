$(document).ready(function () {
  // slick.js
  $('.slider-list').slick({
    autoplay: true,
    autoplaySpeed: 4000,
    fade: true,
    cssEase: 'linear',
    prevArrow: ('.slider-arrow_left'),
    nextArrow: ('.slider-arrow_right'),
  });
  // feedback window open/close
  $('.header-info__feedback-btn').click(function () {
    $('.feedback').fadeIn();
  });
  $('.feedback-close-btn').click(function () {
    $('.feedback').fadeOut();
  });
  // validate.js
$("#feedback-form").validate({
    rules: {
      feedback_name: {
        required: true
      },
      feedback_tel: {
        required: true
      },
      feedback_email: {
        required: true,
        email: true
      }
    },
  invalidHandler: function (form) {
    $.ajax({
      success: function (data) {
        $('.feedback-form__input').css("border", "1px solid #ff8383");
        $('.feedback-form__input').css("box-shadow", "inset 0 0 13px rgba(228, 106, 106, 0.75)");
      }
    })
  }
  });
});
jQuery.extend(jQuery.validator.messages, {
  required: "Поле обязательно для заполнения",
  remote: "Please fix this field.",
  email: "Please enter a valid email address.",
  url: "Please enter a valid URL.",
  date: "Please enter a valid date.",
  dateISO: "Please enter a valid date (ISO).",
  number: "Please enter a valid number.",
  digits: "Please enter only digits.",
  creditcard: "Please enter a valid credit card number.",
  equalTo: "Please enter the same value again.",
  accept: "Please enter a value with a valid extension.",
  maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
  minlength: jQuery.validator.format("Please enter at least {0} characters."),
  rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
  range: jQuery.validator.format("Please enter a value between {0} and {1}."),
  max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
  min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});