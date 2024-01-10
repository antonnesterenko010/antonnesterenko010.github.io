document.addEventListener('DOMContentLoaded', function () {

    /// Burger menu ///
    (() => {
        var menuBtn = document.querySelector('.site-header__wrapper__mobile');
        var menu = document.querySelector('.mob-menu');
        var closeBtn = document.querySelector('.mob-menu__wrapper__mobile');

        if (menuBtn) {
            menuBtn.addEventListener('click', () => {
                menu.classList.add('open')
            })
        }
        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                menu.classList.remove('open')
            })
        }
    })();



        /// Scroll Menu ///
        (() => {
            var whiteHeader = document.querySelector('.site-header');
            var header = document.querySelector('.site-header__fixed');

                window.addEventListener("scroll", () => {
                    const currentScroll = window.pageYOffset;
                    if (currentScroll > 0) {
                        header.classList.add('fixed-head');
                    } else {
                        header.classList.remove('fixed-head');
                    }
                });
                const currentScroll = window.pageYOffset;
                if (currentScroll > 0) {
                    header.classList.add('fixed-head');
                } else {
                    header.classList.remove('fixed-head');
                }


        })();

    (() => {
       let section = document.querySelectorAll('.resize-block');
        if(window.innerWidth <= 650) {
            section.forEach(el => {
                el.style.marginTop = el.getAttribute('margin-mobile-top');
                el.style.marginBottom = el.getAttribute('margin-mobile-bottom');
            });
        }
        if(window.innerWidth >= 651 && window.innerWidth <= 992) {
            section.forEach(el => {
                el.style.marginTop = el.getAttribute('margin-tablet-top');
                el.style.marginBottom = el.getAttribute('margin-tablet-bottom');
            });
        }
        if(window.innerWidth >= 993) {
            section.forEach(el => {
                el.style.marginTop = el.getAttribute('margin-desktop-top');
                el.style.marginBottom = el.getAttribute('margin-desktop-bottom');
            });
        }
    })();


})