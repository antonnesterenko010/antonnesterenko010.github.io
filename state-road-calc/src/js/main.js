$(document).ready(function(){
  $('#calc').change(function(){
    $tattooLenght = $('input#t1').val();
    $tattooWidth = $('input#t2').val();
    $tattooColor = $('select#t3 option:selected').attr('data-color');
    $tattooStyle = $('select#t4 option:selected').attr('data-style');

    $price =  $tattooLenght * $tattooWidth * $tattooColor * $tattooStyle;

    // if ($price < 400) {
    //   $('#btn-result').click(function () {
    //     $('.sum2').text('400');
    //   })
    // }
    // if ($price > 4000) {
    //   $('#btn-result').click(function () {
    //     $('.sum2').text('Ваша татуировка займёт более одного сеанса. Стоимость сеанса 2000-3000 грн, в зависимости от сложности работы. В ближайшее время наш менеджер свяжется с Вами и предоставит детальную консультацию. Спасибо');
    //     $('.sum1').hide();
    //   })
    // }

    $tattooColorName = $('select#t3 option:selected').val();
    $tattooStyleName = $('select#t4 option:selected').val();

    var tprice = document.getElementById('tprice');
    tprice.value = $price;
    // $('.info_price').text($price);
    // $('.info_color').text($tattooColorName);
    // $('.info_style').text($tattooStyleName);

  })
  // $('#btn-result').click(function(){
  //   $('.sum2').text($price);
  // })
// masked input
  $(".form__input__tel").mask("+38 (999) 999-99-99");
// jquery validate init
$("#calc").validate({
    rules: {
      name: {
        required: true
      },
      phone: {
        required: true
      },
      messenger: {
        required: true,
      },
      tcolor: {
        required: true,
      },
      tstyle: {
        required: true,
      }
    },
    messages: {
      name: {
        required: "Пожалуйста, укажите ваше имя"
      },
      phone: {
        required: "Для связи с вами нам необходим ваш мобильный номер"
      },
      messenger: {
        required: "Укажите свой Viber или Telegram"
      },
      tcolor: {
        required: "Выберите вариант цвета желаемого тату"
      },
      tstyle: {
        required: "Выберите стиль татуировки"
      }
    },
    submitHandler: function (form) {
      $.ajax({
        url: 'calculator.php',
        type: 'POST',
        data: $('#calc').serialize(),
        success: function (data) {
          $('.sum2').text($price);
          if ($price < 400) {
            $('.sum2').text('400');
          }
          if ($price > 4000) {
            $('.sum2').text('Ваша татуировка займёт более одного сеанса. Стоимость сеанса 2000-3000 грн, в зависимости от сложности работы. В ближайшее время наш менеджер свяжется с Вами и предоставит детальную консультацию. Спасибо');
          }
          // $('form input[type="text"], form textarea').val('');
          alert('Спасибо! Ваша заявка отправлена :)');
        }
      })
    },
    invalidHandler: function (form) {
      $.ajax({
        success: function (data) {
        // $(".sum2").css("display", "none");
        }
      })
    }
  });
})