var swiper = new Swiper(".gameSwiper", {
    slidesPerView: 1.5,
    spaceBetween: 20,
    navigation: {
        nextEl: ".slider-button-next",
        prevEl: ".slider-button-prev",
    },
    breakpoints: {
        "767": {
            slidesPerView: 3.5,
        }
    }
});

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