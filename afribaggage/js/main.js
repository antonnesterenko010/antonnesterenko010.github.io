$('.header-burger').on('click', function(){
    $('.header').toggleClass('opened');
});
$('.header-locale').on('click', function(){
    $(this).toggleClass('opened');
})

/* Swiper
**************************************************************/
var swiper= Swiper;
var init = false;



/* Which media query
**************************************************************/
function swiperMode() {
    let mobile = window.matchMedia('(min-width: 0px) and (max-width: 1200px)');
    let tablet = window.matchMedia('(min-width: 769px) and (max-width: 1024px)');
    let desktop = window.matchMedia('(min-width: 1201px)');

    // Enable (for mobile)
    if(mobile.matches) {
        if (!init) {
            init = true;
            swiper = new Swiper('.hero-slider', {
                slidesPerView: 3,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                // autoplay: {
                //     delay: 1000,
                //     disableOnInteraction: false,
                // },
                // centeredSlides: true,
                loop: true,
                spaceBetween: 10,
                // direction: 'horizontal',
                // effect: 'coverflow',
            });
        }

    }

    // Disable (for tablet)
    else if(tablet.matches) {
        swiper.destroy();
        init = false;
    }

    // Disable (for desktop)
    else if(desktop.matches) {
        swiper.destroy();
        init = false;
    }
}

/* On Load
**************************************************************/
window.addEventListener('load', function() {
    swiperMode();
});

/* On Resize
**************************************************************/
window.addEventListener('resize', function() {
    swiperMode();
});