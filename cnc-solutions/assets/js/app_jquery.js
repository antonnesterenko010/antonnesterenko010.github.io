var $ = jQuery;
$(document).ready(function () {

    let sliderSection = new Swiper(".slider-list", {
        autoplay : {
            delay: 0,
            speed: 300,
        },
        speed: 6000,
        loop: true,
        noSwiping: true,
        spaceBetween: 110,
        breakpoints: {
            320: {
                slidesPerView: '1.75'
            },
            1200: {
                slidesPerView: '3.25'
            }
        }
    });
});
