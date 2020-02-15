$(document).ready(function(){
  $('#calc').change(function(){
    $tattooLenght = $('input#t1').val();
    $tattooWidth = $('input#t2').val();
    $tattooColor = $('select#t3 option:selected').attr('data-color');
    $tattooStyle = $('select#t4 option:selected').attr('data-style');

    $price =  $tattooLenght * $tattooWidth * $tattooColor * $tattooStyle;

    if ($price < 400) {
      $('#btn-result').click(function () {
        $('.sum2').text('400');
      })
    }
    if ($price > 4000) {
      $('#btn-result').click(function () {
        $('.sum2').text('Ваша татуировка займёт более одного сеанса. Стоимость сеанса 2000-3000 грн, в зависимости от сложности работы. В ближайшее время наш менеджер свяжется с Вами и предоставит детальную консультацию. Спасибо');
        $('.sum1').hide();
      })
    }
  })

  $('#btn-result').click(function(){
    $('.sum2').text($price);
  })

})