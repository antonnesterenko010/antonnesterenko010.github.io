var $ = jQuery;
$(document).ready(function () {

    //Hidden Menu

    $('.menu-header .menu-item-has-children a').click(function () {
        $(this).siblings('.sub-menu').slideToggle(200)
    })


    var windowWidth = $(window).width();

    if (windowWidth < 700) {
        var logosBlock = document.querySelector('.logos-image-block');
        if (logosBlock) {
            logosBlock.querySelector('.logos-block').classList.add('swiper-wrapper');
            var logos = logosBlock.querySelectorAll('.single-logo');
            logos.forEach((el)=>{
               el.classList.add('swiper-slide')
            });
            var logo = new Swiper(".logos-image-block", {
                slidesPerView: 1,
                loop: true,
                breakpoints: {

                    350: {
                        slidesPerView: 2,
                        spaceBetween: 20,

                    },
                    700: {
                        slidesPerView: 3,
                        spaceBetween: 40,
                    },
                },
            });
        }

    }
    var teamBlock = document.querySelector('.team-block');

           var team = new Swiper(".team-section .swiper", {
                slidesPerView: 1,
                spaceBetween: 37,
                autoplay: {
                   delay: 3500,
                   disableOnInteraction: true,
                },
                loop: true,
                breakpoints: {
                    450: {
                        slidesPerView: 1,
                        spaceBetween: 20,

                    },
                    500: {
                        slidesPerView: 2,
                        spaceBetween: 25    ,
                    },
                    850: {
                        slidesPerView: 3,
                        spaceBetween: 25    ,
                    },
                    1200: {
                        slidesPerView: 'auto',
                        spaceBetween: 37,
                    },
                },
            });
        // }

    // }

    var facts = new Swiper(".facts-sub-section .swiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        loop: true,
        breakpoints: {
            650: {
                slidesPerView: 2,
                spaceBetween: 35,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 42,
            },
        },
    });

    var product = new Swiper(".product-sub-section .swiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
        },
        loop: true,
        breakpoints: {
            550: {
                slidesPerView: 2,
                spaceBetween: 20,

            },
            810: {
                slidesPerView: 3,
                spaceBetween: 26,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 26,
            },
        },
    });

    var news = new Swiper(".news-sub-section .swiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        breakpoints: {

            680: {
                slidesPerView: 2,
                spaceBetween: 26,
            },

            1200: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
        navigation: {
            nextEl: ".swiper-button-next-news",
            prevEl: ".swiper-button-prev-news",
        },
    });

    var hero = new Swiper(".hero-module-background .swiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
        },
        loop: true,
    });

});

function initMap() {
    if (!document.getElementById("map")){
        return false
    }
    // The location of Uluru
    const uluru = { lat: 51.412089277982815, lng: 5.8391526683643065 };
    // The map, centered at Uluru

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 17,
        center: uluru,
    });

    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}