/**
 * gallery scripts
 */

swiper = new Swiper('.gallery-slider', {
    slidesPerView: 1,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false
    },
    loop: true,
    pagination: {
        el: '.gallery-pagination'
    },
    breakpoints: {
        1200: {
            slidesPerView: 2,
            spaceBetween: 20
        }
    }
})

swiper = new Swiper('.review-slider', {
    slidesPerView: 1,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false
    },
    loop: true
})
