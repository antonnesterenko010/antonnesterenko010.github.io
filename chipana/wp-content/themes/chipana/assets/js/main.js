document.addEventListener('DOMContentLoaded', function() {
    function scrollToSection(sectionId) {
        const targetSection = document.querySelector(sectionId);

        if (targetSection) {
            targetSection.scrollIntoView({
                behavior: 'smooth'
            });
        }
    }

    function smoothScroll(targetElement) {
        document.querySelector(targetElement).scrollIntoView({
            behavior: 'smooth'
        });
    }

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            smoothScroll(this.getAttribute('href'));
        });
    });



    const serviceCard = document.querySelectorAll('.services-card h4');
    serviceCard.forEach(card => {
        card.addEventListener('click', function() {
            const dataAttrValue = this.parentElement.dataset.attr;
            const correspondingFigures = document.querySelectorAll(`.samples-wrap figure[data-attr="${dataAttrValue}"]`);
            const allFigures = document.querySelectorAll('.samples-wrap figure');
            correspondingFigures.forEach(figure => {
                allFigures.forEach(figure => {
                    figure.classList.add('blurred');
                });
                figure.classList.add('active');

                setTimeout(() => {
                    allFigures.forEach(figure => {
                        figure.classList.remove('blurred');
                    });
                    figure.classList.remove('active');
                }, 5000);
            });
            smoothScroll('#samples');
        })
    });


// Menu burger
    const menuBtn = document.querySelector(".menu-btn");
    const menuMobile = document.querySelector(".menu-mobile");
    const menuItems = document.querySelectorAll(".menu-mobile li");

    function toggleMenu() {
        menuBtn.classList.toggle("menu-open");
        menuMobile.classList.toggle("menu-open");
    }

    function closeMenu() {
        menuBtn.classList.remove("menu-open");
        menuMobile.classList.remove("menu-open");
    }

    menuBtn.addEventListener("click", toggleMenu);

    menuItems.forEach(item => {
        item.addEventListener("click", closeMenu);
    });

// Go to top button
    const goTopBtn = document.querySelector(".go-top-btn");

    window.addEventListener("scroll", checkHeight);
    checkHeight();

    function checkHeight(){
        if(window.scrollY > 200){
            goTopBtn.style.display = "flex";
        } else {
            goTopBtn.style.display = "none";
        }
    }

    goTopBtn.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        })
    });

// Hero slider
    const heroSwiper = new Swiper('.hero-swiper', {
        direction: 'horizontal',
        loop: true,
        centeredSlides: true,

        pagination: {
            el: '.swiper-pagination',
            type: "fraction",
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

// Review slider
    const reviewSwiper = new Swiper('.review-swiper', {
        direction: 'horizontal',
        loop: true,
        centeredSlides: true,

        pagination: {
            el: '.review-swiper-pagination',
            clickable: true,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

// Audioplayer
    const players = document.querySelectorAll('.audio-player');

    players.forEach((player) => {

        const audioContainer = player.querySelector('.audio');

        if (!audioContainer) {
            console.error('Container not found for player:', player);
            return;
        }

        const wavesurfer = WaveSurfer.create({
            container: audioContainer,
            waveColor: "#4B5263",
            progressColor: [
                "rgb(189,98,155)",
                "rgb(251,169,25)",
                "rgb(251,169,25)",
            ],
            barWidth: 4,
            barGap: 8,
            barRadius: 8,
            height: 56,
        });

        wavesurfer.load(player.dataset.src);

        const playBtn = player.querySelector(".play-btn");
        const muteBtn = player.querySelector(".mute-btn");
        const currentTimeElement = player.querySelector('.current-time');
        const totalTimeElement = player.querySelector('.total-time');

        playBtn.addEventListener("click", () => {
            wavesurfer.playPause();

            if (wavesurfer.isPlaying()) {
                playBtn.classList.add("playing");
            } else {
                playBtn.classList.remove("playing");
            }
        });

        muteBtn.addEventListener("click", () => {
            if (muteBtn.classList.contains("muted")) {
                muteBtn.classList.remove("muted");
                wavesurfer.setVolume(1);
            } else {
                wavesurfer.setVolume(0);
                muteBtn.classList.add("muted");
            }
        });

        wavesurfer.on('finish', () => {
            playBtn.classList.remove("playing");
            wavesurfer.stop();
            currentTimeElement.textContent = '0:00';
        });

        wavesurfer.on('ready', function () {
            const totalTime = wavesurfer.getDuration();
            totalTimeElement.textContent = calculateTime(totalTime);
        });

        wavesurfer.on('audioprocess', function () {
            if (wavesurfer.isPlaying()) {
                const currentTime = wavesurfer.getCurrentTime();
                currentTimeElement.textContent = calculateTime(currentTime);
            }
        });

        wavesurfer.on('seeking', function () {
            const currentTime = wavesurfer.getCurrentTime();
            currentTimeElement.textContent = calculateTime(currentTime);
        });

        function calculateTime(secs) {
            const minutes = Math.floor(secs / 60);
            const seconds = Math.floor(secs % 60);
            const returnedSeconds = seconds < 10 ? `0${seconds}` : `${seconds}`;
            return `${minutes}:${returnedSeconds}`;
        }
    });

});

