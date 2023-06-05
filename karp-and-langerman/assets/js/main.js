jQuery(document).ready(function( $ ) {
    /*menu*/
    $(document).on('click', '.menu-btn', function () {
        $('body').toggleClass('open-main-menu');
    });

    $(document).on('click', '.expand-btn-wrap', function () {
        const parent = $(this).parent();
        if (parent.hasClass('active')) {
            parent.removeClass('active')
            return
        }
        $('.extra-class-name.active').removeClass('active');
        parent.toggleClass('active');
    });

    $(document).on('click', '.toc-header', function () {
        $(this).parent().toggleClass('active');
    });

    $('.header-btn').click(function(){
        $('body').removeClass('open-main-menu');
    });
    //contact form

    $('.wpcf7-response-output').click(function(){
        $('.wpcf7-response-output').css('display', 'none');
    });

    $('.swal2-close').click(function(){
        $('.swal2-container').removeClass('swal2-shown');
        $('.swal2-popup').css('display', 'none');
    });
    $(document).on('ready', function () {
        $('.form-check .wpcf7-list-item .wpcf7-list-item-label').text(' ');
        $(document).on('focus', '.wpcf7-form-control', function () {
            if ($(this).hasClass('wpcf7-not-valid')) {
                $(this).next("span").remove();
                $(this).removeClass('wpcf7-not-valid');
            }
        });

        $(document).on('click', '.wpcf7-submit', function () {
            mailSent = false;
            setTimeout(function () {
                let iteration = 0;
                let mailSender = setTimeout(function request() {
                    if (!mailHandler() || iteration <= 3) {
                        mailSender = setTimeout(request, 1000);
                    }
                    iteration++;
                }, 3000);
            }, 1000);
        });
        let mailSent = false;
        function mailHandler() {
            if (!mailSent) {
                mailSent = true;
                $('.wpcf7-response-output').fadeOut(6000);
            }
            return mailSent;
        }

    });
    //people tab
    $('section.info .info-r .title').click(function(){
        $('.title').removeClass('active');
        $(this).toggleClass('active');
    });

    $('.info-r .title').click(function(){
        $('.content').removeClass('active');
        let title_num = $(this).data('title');
        $('.content-' + title_num).toggleClass('active').fadeIn();
    });

    $('a[href^="#"]').click(function () {
        let target = $(this).attr('href');
        let fixed_offset = 120;
        $('html, body').animate({
            scrollTop: $(target).offset().top - fixed_offset
        }, 1500);
    });
});