var swiper = new Swiper(".gameSwiper", {
    spaceBetween: 10,
    slidesPerView: 1,
    freeMode: true,
    watchSlidesProgress: true,
    breakpoints: {
        992: {
            slidesPerView: 6,
        }
    }
});
var swiper2 = new Swiper (".gameSwiper2", {
    spaceBetween: 0,
    effect: "cowerflow",
    draggable: false,
    navigation: {
        prevEl: ".game-button-prev",
        nextEl: ".game-button-next",
    },
    thumbs: {
        swiper: swiper
    }
})

jQuery(document).ready(function( $ ) {
    $('.burger').click(function(){
        $(this).toggleClass('active');
        $('.header').toggleClass('active');
        $('body').toggleClass('overflow-hidden');
    });
    //modal window
    $('.page-template-page-registration').on('click', '.form-submit-btn', function (e){
        e.preventDefault();
        $('.modal-overlay').fadeIn();
        $('body').addClass('overflow-hidden');
    });

    $('.modal-close, .modal-btn').on('click', function(e){
        e.preventDefault();
        $('.modal-overlay').fadeOut();
        $('body').removeClass('overflow-hidden');
    });
    // game window init
    $('.page__content').on('click', '.game-window', function(e) {
        $('.content__form.game').addClass('show');
        $('body').addClass('overlayed');
        $('.content__form.game .game-content').append('<iframe class="game-frame" src="'+$(this).attr('data-src')+'"></iframe>');
    })
    $('.content-block').on('click', '.game-close', function(){
        $('.content__form.game').removeClass('show');
        $('body').removeClass('overlayed');
        $(this).parent().find('.game-frame').detach();
    })
});