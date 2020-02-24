// Обработка и отправка формы через AJAX
$('#offer-form').on('submit', function (event) {
  event.preventDefault();
  $.ajax ({
    url: 'mail.php',
    type: 'POST',
    data: $(this).serialize(),
    success: function(data) {
      $('.success').html(data + ', Ваша форма отправлена!');      
    },
    error: function(jqXHR, textStatus) {
      console.log(jqXHR + ': ' + textStatus);
      
    }

  });
});

$('#modal-dialog-form').on('submit', function (event) {
  event.preventDefault();
  $.ajax({
    url: 'mail.php',
    type: 'POST',
    data: $(this).serialize(),
    success: function (data) {
      $('.modal-success').html(data + ', Ваша форма отправлена!');
    },
    error: function (jqXHR, textStatus) {
      console.log(jqXHR + ': ' + textStatus);

    }

  });
});