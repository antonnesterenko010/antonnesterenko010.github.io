document.addEventListener('DOMContentLoaded', function () {

    const thumbsSlider = new Swiper(".slider .thumbs__list", {
    loop: true,
    autoplay: true,
    breakpoints: {
        1: {
            slidesPerView: 1,
            spaceBetween: 0
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 40,
        },
        1200: {
            slidesPerView: 3,
            spaceBetween: 82,
            centeredSlides: true,
        }
    }
});
const homeSlider = new Swiper(".slider .slider__list", {
    allowTouchMove: false,
    centeredSlides: true,
    autoplay: true,
    pagination: {
        el: ".slider__navigation__progress",
        type: "fraction",
        formatFractionCurrent: function (number) {
            return ("0" + number).slice(-2);
        },
        formatFractionTotal: function (number) {
            return ("0" + number).slice(-2);
        },
        renderFraction: function (currentClass, totalClass) {
            return '<span class="' + currentClass + '"></span>' +
                '/' +
                '<span class="' + totalClass + '"></span>';
        }
    },
    navigation: {
        nextEl: ".slider__navigation__next",
        prevEl: ".slider__navigation__prev",
    }
});

function updateNavButtons() {
    const prevButton = document.querySelector(".slider__navigation__prev");
    const nextButton = document.querySelector(".slider__navigation__next");

    const activeIndex = homeSlider.realIndex + 1;
    const realSlidesCount = homeSlider.slides.length;

    if (activeIndex === 1) {
        prevButton.classList.add("disabled");
    } else {
        prevButton.classList.remove("disabled");
    }

    if (activeIndex === realSlidesCount) {
        nextButton.classList.add("disabled");
    } else {
        nextButton.classList.remove("disabled");
    }
}
homeSlider.on("slideChange", updateNavButtons);
updateNavButtons();
});