// var swiper = new Swiper(".gameSwiper", {
//     destroy: true,
//     slidesPerView: 2.25,
//     spaceBetween: 10,
//     // navigation: {
//     //     nextEl: ".slider-button-next",
//     //     prevEl: ".slider-button-prev",
//     // },
//     breakpoints: {
//         "992": {
//             destroy: false,
//             slidesPerView: 3.25,
//             spaceBetween: 20,
//         }
//     }
// });

jQuery(document).ready(function() {
    var initSwiper = false;

    function swiperCard() {
        if (window.innerWidth >= 768) {
            if (!initSwiper) {
                initSwiper = true;
                var swiper = new Swiper(".gameSwiper", {
                    slidesPerView: 2.25,
                    spaceBetween: 10,
                    breakpoints: {
                        "992": {
                            slidesPerView: 3.25,
                            spaceBetween: 20,
                        }
                    }
                });
            }
        } else if (initSwiper) {
            swiper.destroy();
            initSwiper = false;
        }
    }

    swiperCard();
    window.addEventListener("resize", swiperCard);
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
        $('.content__form.game .game-content').append('<iframe class="game-frame" src="'+$(this).attr('data-src')+'"></iframe>');
    })
    $('.content-block').on('click', '.game-close', function(){
        $('.content__form.game').removeClass('show');
        $(this).parent().find('.game-frame').detach();
    })
});