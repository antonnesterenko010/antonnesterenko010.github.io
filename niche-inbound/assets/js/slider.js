const swiper = new Swiper('.swiper-container', {
    // Optional parameters
    autoplay : {
        delay: 0,
        speed: 300,
    },
    loop: true,
    noSwiping: true,
    breakpoints: {
        320: {
            speed: 6000,
            slidesPerView: 'auto'
        },
        992: {
            slidesPerView: 'auto',
            speed: 6000
        }
    }
});