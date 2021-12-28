$('.header-mobile .header-lang-btn').on('click', function(){
    $('.header-overlay').addClass('opened');
    $('body').addClass('overflow-hidden');
});
$('body').on('click', function(e) {
    if($(e.target).closest('.header-lang-btn').length == 0) {
        $('.header-overlay').removeClass('opened');
        $('.header-lang-list').removeClass('opened');
        $('.header-lang-btn .lang-carret').addClass('rotate');
        $('body').removeClass('overflow-hidden');
    }
});
$(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 400) {
        $("body").addClass("scroll-down");
    } else {
        $("body").removeClass("scroll-down");
    }
});
//russia

$('.header-mobile .header-lang-item.lang-ru, .header-desktop .header-lang-btn_wrapper.lang-ru .header-lang-btn, .header-desktop .header-lang-item.lang-ru').on('click', function(e){
    $('.header-overlay').removeClass('opened');
    $('body').removeClass('lang-ua lang-en lang-sg overflow-hidden');
    $('body').addClass('lang-ru');
    $('.header-mobile .header-lang-btn').hide();
    $('.header-mobile .header-lang-btn.lang-ru').show();
    $('.header-desktop .header-lang-btn_wrapper.lang-ru .header-lang-list').toggleClass('opened');
    $('.header-desktop .header-lang-btn_wrapper.lang-ru .header-lang-btn .lang-carret').toggleClass('rotate');
    $('.header-desktop .header-lang-btn_wrapper').hide();
    $('.header-desktop .header-lang-btn_wrapper.lang-ru').show();
});
//ukraine
$('.header-mobile .header-lang-item.lang-ua, .header-desktop .header-lang-btn_wrapper.lang-ua .header-lang-btn, .header-desktop .header-lang-item.lang-ua').on('click', function(e){
    $('.header-overlay').removeClass('opened');
    $('body').removeClass('lang-ru lang-en lang-sg overflow-hidden');
    $('body').addClass('lang-ua');
    $('.header-mobile .header-lang-btn').hide();
    $('.header-mobile .header-lang-btn.lang-ua').show();
    $('.header-desktop .header-lang-btn_wrapper.lang-ua .header-lang-list').toggleClass('opened');
    $('.header-desktop .header-lang-btn_wrapper.lang-ua .header-lang-btn .lang-carret').toggleClass('rotate');
    $('.header-desktop .header-lang-btn_wrapper').hide();
    $('.header-desktop .header-lang-btn_wrapper.lang-ua').show();
});
//english
$('.header-mobile .header-lang-item.lang-en, .header-desktop .header-lang-btn_wrapper.lang-en .header-lang-btn, .header-desktop .header-lang-item.lang-en').on('click', function(){
    $('.header-overlay').removeClass('opened');
    $('body').removeClass('lang-ru lang-ua lang-sg overflow-hidden');
    $('body').addClass('lang-en');
    $('.header-mobile .header-lang-btn').hide();
    $('.header-mobile .header-lang-btn.lang-en').show();
    $('.header-desktop .header-lang-btn_wrapper.lang-en .header-lang-list').toggleClass('opened');
    $('.header-desktop .header-lang-btn_wrapper.lang-en .header-lang-btn .lang-carret').toggleClass('rotate');
    $('.header-desktop .header-lang-btn_wrapper').hide();
    $('.header-desktop .header-lang-btn_wrapper.lang-en').show();
});
// //singala
$('.header-mobile .header-lang-item.lang-sg, .header-desktop .header-lang-btn_wrapper.lang-sg .header-lang-btn, .header-desktop .header-lang-item.lang-sg').on('click', function(){
    $('.header-overlay').removeClass('opened');
    $('body').removeClass('lang-ru lang-ua lang-en overflow-hidden');
    $('body').addClass('lang-sg');
    $('.header-mobile .header-lang-btn').hide();
    $('.header-mobile .header-lang-btn.lang-sg').show();
    $('.header-desktop .header-lang-btn_wrapper.lang-sg .header-lang-list').toggleClass('opened');
    $('.header-desktop .header-lang-btn_wrapper.lang-sg .header-lang-btn .lang-carret').toggleClass('rotate');
    $('.header-desktop .header-lang-btn_wrapper').hide();
    $('.header-desktop .header-lang-btn_wrapper.lang-sg').show();

});
$('.header-mobile .header-lang-list .header-lang-item.lang-ru').on('click', function(){
    window.location.search = '&hl=ru';
    return false;
})
$('.header-mobile .header-lang-list .header-lang-item.lang-ua').on('click', function(){
    window.location.search = '&hl=ua';
    return false;
})
$('.header-mobile .header-lang-list .header-lang-item.lang-en').on('click', function(){
    window.location.search = '&hl=en';
    return false;
})
$('.header-mobile .header-lang-list .header-lang-item.lang-sg').on('click', function(){
    window.location.search = '&hl=sg';
    return false;
})
$('a[href^="#"]').click(function () {
    let target = $(this).attr('href');
    let fixed_offset = -55;
    $('html, body').animate({
        scrollTop: $(target).offset().top - fixed_offset
    }, 1500);
});
swiper = new Swiper('.home-slider', {
    slidesPerView: 1,
    navigation: {
        prevEl: ".slider-button-prev",
        nextEl: ".slider-button-next",
    },
    autoplay: {
        delay: 3000,
        disableOnInteraction: false
    },
    loop: true
})