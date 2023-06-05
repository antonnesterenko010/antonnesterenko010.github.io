jQuery(document).ready(function( $ ) {
    $('.burger').click(function(){
        $(this).toggleClass('active');
        $('.header').toggleClass('active');
        $('body').toggleClass('overflow-hidden');
    });
    //modal window
    $('.form-with-answer').on('click', '.form-submit-btn', function (e){
        e.preventDefault();
        $(this).closest('.form-with-answer').find('input').each(function (e){
            if($(this).attr('type') != 'submit') {$(this).val('');}
        });
        $(this).closest('.form-with-answer').find('textarea').each(function (e){
            if($(this).attr('type') != 'submit') {$(this).val('');}
        });
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