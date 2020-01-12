$(document).ready(function () {
  $(".myLink").keyup(function () {
    var getvalue = $(this).attr('href');
    $(this).parent().find('input').val(getvalue);
  }).keyup();

$('.links-input').each(function(i, item){
  $(item).addClass('clipboard-text-' + i);
  
  var btn = $('<button class="button-copy"><img src="img/copy.svg" alt="Копировать"></button>');
  btn.addClass('js-copy-btn');
  btn.attr('data-clipboard-target', '.clipboard-text-' + i);
  $(item).after(btn);
})
});