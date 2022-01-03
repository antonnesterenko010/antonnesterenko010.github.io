$('.header-burger').on('click', function() {
    $(this).toggleClass('opened');
    $('.header').toggleClass('opened');
})
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    $('.header').removeClass('scroll-down');
    if (scroll >= 50) {
        $('.header').addClass('scroll-down');
    }
});
$('a[href^="#"]').click(function () {
    let target = $(this).attr('href');
    let fixed_offset = -55;
    $('html, body').animate({
        scrollTop: $(target).offset().top - fixed_offset
    }, 1500);
});


$('.horse-list-item').on('click', function(){
    $(this).toggleClass('hidden');
})