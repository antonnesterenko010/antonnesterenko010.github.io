function resetOnce() {
    document.cookie = "doSomethingOnlyOnce=true; expires=Thu, 01 Jan 2350 00:00:00 GMT";
}
(function ($) {

    $('.cookies-btn').click(function(){
        $('.cookies').fadeOut();
    })
    $('#form-checkbox').click(function(){
        if($(this).is(':checked')) {
            console.log('checked');
            $('.form-tooltip').removeClass('active');
            $('.form-btn-group-wrapper').removeClass('disabled');
            $('.form-btn').removeAttr('disabled','disabled');
        }  else {
            console.log('unchecked');
            $('.form-tooltip').addClass('active');
            $('.form-btn-group-wrapper').addClass('disabled');
        }
    })
    $('.form-btn').attr('disabled','disabled');
    $('.burger, .header-mobile .nav-wrapper a').click(function(){
        $('.burger').toggleClass('active');
        $('.header-mobile').toggleClass('active');
        $('body').toggleClass('overflow-hidden');
    });
    $('.partners-btn').click(function(){
        $('.partner').addClass('view-more');
        $(this).hide();
    });
    $('.form-input').focus(function(){
        $(this).parent().prev().addClass('hidden');
    });
    if ($(window).width() > 991) {
        $('a[href^="#"]').click(function () {
            let target = $(this).attr('href');
            let fixed_offset = 110;
            $('html, body').animate({
                scrollTop: $(target).offset().top - fixed_offset
            }, 1500);
        });
        if(window.location.hash){
            let hash = window.location.hash;
            if ($(hash).length>0){
                setTimeout(function() {
                    window.scrollTo(0, 0);
                }, 1);

                setTimeout(function() {
                    $('html, body').animate({
                        scrollTop: ($(hash).offset().top - 110)
                    }, 700);
                }, 500);
            }
        }
    }
    else {
        $('a[href^="#"]').click(function () {
            let target = $(this).attr('href');
            let fixed_offset = 40;
            $('html, body').animate({
                scrollTop: $(target).offset().top - fixed_offset
            }, 1500);
        });
        if(window.location.hash){
            let hash = window.location.hash;
            if ($(hash).length>0){
                setTimeout(function() {
                    window.scrollTo(0, 0);
                }, 1);

                setTimeout(function() {
                    $('html, body').animate({
                        scrollTop: ($(hash).offset().top - 40)
                    }, 700);
                }, 500);
            }
        }
    }

    document.addEventListener( 'wpcf7mailsent', function( event ) {
        location = '/thank-you';
    }, false );
})(jQuery);