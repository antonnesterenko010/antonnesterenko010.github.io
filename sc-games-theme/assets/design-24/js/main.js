var swiper = new Swiper(".gameSwiper", {
    slidesPerView: 1.19,
    spaceBetween: 16,
    breakpoints: {
        "767": {
            slidesPerView: 2.76,
            spaceBetween: 23,
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
    $(".hero-play-button a").click(function(e) {
        e.preventDefault();
        var aid = $(this).attr("href");
        $('html,body').animate({scrollTop: $(aid).offset().top},'slow');
    });
    openModal('.header-sign-up a', '#modalRegister');
    openModal('.button-contact', '#modalContact');
    function openModal(button, modal) {
        $(button).on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(modal).addClass('show');

            $(document).on('click', function closeMenu (e){
                if($('.modal .content-block').has(e.target).length === 0){
                    $('.modal').removeClass('show');
                } else {
                    $(document).on('click', closeMenu);
                }
            });
        });
    }
});