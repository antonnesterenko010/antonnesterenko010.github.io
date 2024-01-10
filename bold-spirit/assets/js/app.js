document.addEventListener('DOMContentLoaded', function () {
    const scrollToTopBtn = document.querySelector('.scroll-to-top');
    const scrollToFormBtn = document.querySelector('.hero__btn');
    const formWrapper = document.querySelector('.form-module');
    let scrollDuration = 1800;
    window.addEventListener("scroll", () => {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.add("show");
        } else {
            scrollToTopBtn.classList.remove("show");
        }
    });

    scrollToTopBtn.addEventListener("click", () => {
        smoothScrollTo(0, scrollDuration);
    });
    scrollToFormBtn.addEventListener('click', () => {
        smoothScrollTo(formWrapper.getBoundingClientRect().top, scrollDuration);
    });

    function smoothScrollTo(targetPosition, duration) {
        const startPosition = window.pageYOffset;
        const distance = targetPosition - startPosition;
        const startTime = performance.now();

        function scrollAnimation(currentTime) {
            const elapsedTime = currentTime - startTime;
            const progress = Math.min(elapsedTime / duration, 1);
            const easedProgress = easeInOutCubic(progress); // Apply easing function
            const newPosition = startPosition + distance * easedProgress;

            window.scrollTo(0, newPosition);

            if (progress < 1) {
                requestAnimationFrame(scrollAnimation);
            }
        }

        requestAnimationFrame(scrollAnimation);
    }

    function easeInOutCubic(t) {
        // Custom easing function (cubic easing)
        return t < 0.5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1;
    }

    const contactFormInputs = document.querySelectorAll('.form-module .wpforms-field input');
    const contactFormTextarea = document.querySelector('.form-module .wpforms-field textarea');
    contactFormInputs.forEach(function(input) {
        let contactFormWrapper = document.createElement('div');
        contactFormWrapper.className = 'input-wrapper';
        input.parentNode.appendChild(contactFormWrapper);
        contactFormWrapper.appendChild(input);
    })

    let contactFormTextareaWrapper = document.createElement('div');
    contactFormTextareaWrapper.className = 'input-wrapper';
    contactFormTextarea.parentNode.appendChild(contactFormTextareaWrapper);
    contactFormTextareaWrapper.appendChild(contactFormTextarea);

//  Contact form submit button
    const contactFormButton = document.querySelector('.form-module .form__btn');
    const contactFormButtonBackground = document.createElement('span');
    contactFormButtonBackground.className = 'form__btn-bg';
    contactFormButton.appendChild(contactFormButtonBackground);

    const contactFormButtonTextDefault = contactFormButton.textContent;
    const contactFormButtonTextNew = document.createElement('span');
    contactFormButton.appendChild(contactFormButtonTextNew);
    contactFormButtonTextNew.textContent = contactFormButtonTextDefault;

// Select the PDF form submit button
    const pdfFormButton = document.querySelector('.contact .form__btn');
    const pdfFormButtonBackground = document.createElement('span');
    pdfFormButtonBackground.className = 'form__btn-bg';
    pdfFormButton.appendChild(pdfFormButtonBackground);

    const pdfFormButtonTextDefault = pdfFormButton.textContent;
    const pdfFormButtonTextNew = document.createElement('span');
    pdfFormButton.appendChild(pdfFormButtonTextNew);
    pdfFormButtonTextNew.textContent = pdfFormButtonTextDefault;

    let pdfForm = document.getElementById('wpforms-form-248');

    pdfForm.addEventListener('submit', function(event) {
        let pdfFormInputName = document.getElementById('wpforms-248-field_1');
        let pdfFormInputEmail = document.getElementById('wpforms-248-field_2');
        setTimeout(function() {
            if (pdfFormInputEmail.classList.contains('wpforms-error')) {
                console.log('there is an error');
            } else {
                console.log('no error');
                const main = document.querySelector('.site-body')
                main.classList.add('show-popup')
            }
        }, 1000);
    });

    const btnDowloadPopup = document.querySelector('.popup-download__btn');
    btnDowloadPopup.addEventListener('click', function() {
        const main = document.querySelector('.site-body')
        main.classList.remove('show-popup');
    });


    //slider section swiper init

    let sliderSection = new Swiper(".slider-main-wrapper .slider-container", {
        // spaceBetween  : -50,
        spaceBetween: 10,
        slidesPerView : 'auto',
        speed         : 500,
        loop          : true,
        centeredSlides: true,
        navigation: {
            nextEl: '.swiper-arrow__next',
            prevEl: '.swiper-arrow__prev'
        },
        /*pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true,
        },*/
        breakpoints: {
            769: {
                spaceBetween: 12,
            },
            1025: {
                spaceBetween: 31
            }
        }
    });

    let reviewSection = new Swiper(".review-main-wrapper .review-container", {
        spaceBetween: 5,
        slidesPerView : 'auto',
        centeredSlides: true,
        loop          : true,
        navigation: {
            nextEl: '.review-arrows .swiper-arrow__next',
            prevEl: '.review-arrows .swiper-arrow__prev'
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            360: {
                initialSlide: 8,
            },
            769: {
                slidesPerView: 2,
                spaceBetween: 7,
            },
            1025: {
                slidesPerView: 3,
                spaceBetween: 15,
                initialSlide: 0,
            }
        },
        on: {
            init: function () {
                // Find the tallest slide height
                let tallestHeight = 0;
                this.slides.each(function () {
                    const slideHeight = this.clientHeight;
                    if (slideHeight > tallestHeight) {
                        tallestHeight = slideHeight;
                    }
                });

                // Set the height of all slides to match the tallest slide
                this.slides.each(function () {
                    this.style.height = `${tallestHeight + 20}px`;
                });

                // Update swiper to adjust to new slide heights
                this.update();
            },
        },
    });
});
