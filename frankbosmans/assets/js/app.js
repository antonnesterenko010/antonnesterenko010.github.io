document.addEventListener('DOMContentLoaded', function () {
    const headerContainer = document.querySelector('.header');
    const bodyContainer = document.querySelector('body');
    /// Burger menu ///
    (() => {
        const headerMobile = document.querySelector('.header-mobile');
        const burgerBtns = document.querySelectorAll('.header-burger');
        const headerBtns = document.querySelectorAll('.header-button');
        burgerBtns.forEach(function(burgerBtn) {
            burgerBtn.addEventListener('click', () => {
                headerContainer.classList.toggle('active');
                bodyContainer.classList.toggle('overflow-hidden');
            })
        });
        headerBtns.forEach(function(headerBtn) {
            headerBtn.addEventListener('click', function(e) {
                e.preventDefault();
                let target = headerBtn.getAttribute('href');
                headerContainer.classList.remove('active');
                bodyContainer.classList.remove('overflow-hidden');
                smoothScroll(target, 1000);
            })
        })
    })();
    //contact form labels
    (() => {
        const inputElements = document.querySelectorAll('.input-group input');
        const labelElements = document.querySelectorAll('.input-group label');

        function applyLabelEffect() {
            const label = this.parentElement.nextElementSibling;
            label.style.top = '-26px';
            label.style.color = '#888BAB';
            label.style.fontSize = '14px';
        }

        function removeLabelEffect() {
            const label = this.parentElement.nextElementSibling;
            if (!this.value) {
                label.style.top = '0';
                label.style.color = '#fff';
                label.style.fontSize = '16px';
            }
        }

        inputElements.forEach(function(input) {
            input.addEventListener('input', applyLabelEffect);
            input.addEventListener('click', applyLabelEffect);
            input.addEventListener('blur', removeLabelEffect);
        });
    })();


    function smoothScroll(target, duration) {
        let targetElement = document.querySelector(target);
        let targetPosition = targetElement.getBoundingClientRect().top;
        let startPosition = window.pageYOffset;
        let distance = targetPosition - startPosition;
        let startTime = null;

        function animation(currentTime) {
            if (startTime === null) startTime = currentTime;
            let timeElapsed = currentTime - startTime;
            let run = ease(timeElapsed, startPosition, distance, duration);
            window.scrollTo(0, run);
            if (timeElapsed < duration) requestAnimationFrame(animation);
        }

        function ease(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        }

        requestAnimationFrame(animation);
    }

    let contactAnchorBtns = document.getElementsByClassName('.header-button');
    for(let i = 0; i < contactAnchorBtns.length; i++) {
        contactAnchorBtns[i].addEventListener('click', function() {
            headerContainer.classList.remove('active');
            bodyContainer.classList.remove('overflow-hidden');
            smoothScroll('.contact', 1000);
        })
    }

    //header menu items
    (() => {
        const menuItems = document.querySelectorAll('.header-menu__item__title');

        menuItems.forEach(function(menuItem) {
            menuItem.addEventListener('click', function(e) {
                e.preventDefault();
                let target = menuItem.getAttribute('href');
                headerContainer.classList.remove('active');
                bodyContainer.classList.remove('overflow-hidden');
                smoothScroll(target, 1000);
            })
        })
    })();

    //header menu items hover
    (() => {
        const menuItems = document.querySelectorAll('.header-menu__item');

        menuItems.forEach(function(menuItem) {
            menuItem.addEventListener('mouseover', function() {
                menuItems.forEach(function(item) {
                    if (item !== menuItem) {
                        item.style.opacity = '0.5';
                    }
                });
            });
            menuItem.addEventListener('mouseout', function() {
                menuItems.forEach(function(item) {
                    item.style.opacity = '1';
                });
            });
        });

    })();

})