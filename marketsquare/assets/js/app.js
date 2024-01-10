jQuery(function ($) {
    $(document).ready(function () {
        var site = $('.site');
        var scroll = $(window).scrollTop();
        site.addClass('header-sticky');
        if (scroll >= 40) {
            site.addClass('header-sticky_show');
        }
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll >= 40) {
                site.addClass('header-sticky');
                site.addClass('header-sticky_show');
            } else if (scroll < 40 && $(window).width() > 870) {
                site.removeClass('header-sticky');
                if (site.hasClass('sticky-menu-open')) {
                    site.removeClass('sticky-menu-open');
                }
            } else if (scroll < 40) {
                site.removeClass('header-sticky_show');
            }
        });


        var businessButton = $('.business-principle__arrow-bot-wrapper');


        businessButton.each(function () {
            var title1 = $(this).parent().children('h4');
            var title2 = $(this).parent().children('h6');
            $(this).add(title1).add(title2).on("click", function () {
                var businessDesc = $(this).parent().children('p');
                var arrow = $(this).parent().children('.business-principle__arrow-bot-wrapper');
                if (arrow.hasClass('arrow-top')) {
                    businessDesc.slideUp();
                    arrow.removeClass('arrow-top');
                } else {
                    businessDesc.slideDown();
                    arrow.addClass('arrow-top');
                }

            })
        });


        $('.sticky-btn').on('click', function () {
            site.toggleClass('sticky-menu-open');
        });

        var burgerBottom = $('.burger-bottom');
        burgerBottom.on('click', function () {
            site.toggleClass('sticky-menu-open');
        });

        $(document).on('mousedown', function (e) {
            if (!e.target.closest('.site-header') && !e.target.closest('.menu-toggle-btn') && !e.target.closest('.burger-bottom')) {
                site.removeClass('sticky-menu-open');
            }
        });

        $('.video__module').addClass('video-ready');
        /*$('.video__module iframe').on('load', function () {
            $('.video__module').addClass('video-ready');
            $('.loader').addClass('loader-none ');
        });*/

        $('.video-hero').addClass('video-ready');
        /*$('.hero-frame').on('load', function () {
            $('.video-hero').addClass('video-ready');
        });*/


    });
});
/// About module ///

jQuery(function ($) {
    $(document).ready(function () {
        var content = document.querySelectorAll('.about__module__wrapper')
        var bodychange = document.querySelector('body');
        var cursor = document.getElementById("cursor-about");
        var media = document.querySelectorAll('.about__module__wrapper__media p');
        if (!content) {
            return;
        }

        var oldx = 0;
        var direction = '';
        var oldDirection = '';
        var fullWidth = $(window).width();
        var start = 0;
        var link = '';
        var transform = 50;
        if (!cursor) {
            return;
        }
        document.getElementsByTagName("body")[0].addEventListener("mousemove", function (n) {
            cursor.style.left = n.clientX + "px",
                cursor.style.top = n.clientY + "px";
            if (n.target.closest('.about__module__wrapper__content') && n.target.tagName.toLowerCase() === 'a') {
                n.target.closest('.about__module__wrapper__content').classList.add('hover')
                n.target.classList.add('active')
                if (fullWidth / 2 > n.pageX) {
                    cursor.classList.add('left')
                    cursor.classList.remove('right')
                } else {
                    cursor.classList.add('right')
                    cursor.classList.remove('left')
                }
            }
        });

        content.forEach(e => {
            var links = e.querySelectorAll('.about__module__wrapper__content a');
            if (!links) {
                return;
            }
            links.forEach((el, key) => {
                el.addEventListener('mouseenter', function (e) {
                    cursor.classList.add('active');
                    var fileFormat = media[key].innerText.split('.').pop().toLowerCase();
                    if (fileFormat === 'mp4') {
                        cursor.innerHTML = `<video autoplay loop playsinline muted="muted" src="${media[key].innerText}" class="autoplay"></video>`;
                    } else {
                        cursor.style.backgroundImage = `url("${media[key].innerText}")`;
                    }
                });
                el.addEventListener('mouseleave', function () {
                    cursor.classList.remove('active');
                    cursor.style.backgroundImage = '';

                    var videoElement = cursor.querySelector('video');
                    if (videoElement) {
                        videoElement.remove();
                    }
                    el.closest('.about__module__wrapper__content').classList.remove('hover')
                    el.classList.remove('active')
                })
            })
        })
    });
});
/// Sticky arrow ///

jQuery(function ($) {
    $(document).ready(function () {
        var stickyArrow = $('.sticky-arrow');
        var sections = $('section');
        var sectionsLength = sections.length;
        var posFirstSection = $('section:eq(1)').offset().top;
        var footerHeight = $('footer').height();
        var j = false;
        stickyArrow.click(function () {
            stickyArrow.parent().removeClass('absolute-top');
            $(this).css('pointer-events', 'none');


            if ($(this).hasClass('sticky-arrow-top')) {
                $('html, body').animate({
                    scrollTop: $('section:eq(0)').offset().top
                }, 800, function () {
                    stickyArrow.removeClass('sticky-arrow-top');
                    stickyArrow.addClass('sticky-arrow-bottom');
                    j = false;
                    stickyArrow.css('pointer-events', 'unset');
                });
            } else {
                sections.each(function (i) {
                    var headerHeight = $('.site-header').height();
                    var targetPos = $(this).offset().top - headerHeight;
                    var windowScroll = $(window).scrollTop();
                    if (~~targetPos > windowScroll) {
                        j = true;
                        $('html, body').animate({
                            scrollTop: targetPos
                        }, 800, function () {
                            j = false;
                            stickyArrow.css('pointer-events', 'unset');
                        });
                        if (i === sectionsLength - 1) {
                            stickyArrow.removeClass('sticky-arrow-bottom');
                            stickyArrow.addClass('sticky-arrow-top');
                        }
                        return false
                    }
                });
            }
        });

        var scroll = $(window).scrollTop();
        if (scroll === 0) {
            stickyArrow.parent().css('top', posFirstSection + 50);
            stickyArrow.parent().addClass('absolute-top');
        }
        $(window).scroll(function () {
            if (j) {
                return
            }
            var scroll = $(window).scrollTop();
            stickyArrow.parent().removeClass('absolute-top');
            stickyArrow.parent().css('top', 'unset');
            if (posFirstSection + 20 > stickyArrow.offset().top) {
                stickyArrow.parent().css('top', posFirstSection + 30);
                stickyArrow.parent().addClass('absolute-top');

            }
            if (scroll === 0) {
                stickyArrow.removeClass('sticky-arrow-top');
                stickyArrow.addClass('sticky-arrow-bottom');
            }

            var numSection = sectionsLength - 2;
            var positionBot = $('section:eq(' + numSection + ')').offset().top;
            if (scroll > positionBot) {
                stickyArrow.removeClass('sticky-arrow-bottom');
                stickyArrow.addClass('sticky-arrow-top');
            }
            if ((scroll > $('.site-footer').offset().top - $('.site-footer').height() - 700) && window.screen.height > 1200) {
                stickyArrow.parent().addClass('sticky-arrow-absolute');
                stickyArrow.parent().css('bottom', footerHeight - 20);
            } else if (scroll > $('.site-footer').offset().top - $('.site-footer').height() - 200) {
                stickyArrow.parent().addClass('sticky-arrow-absolute');
                stickyArrow.parent().css('bottom', footerHeight - 20);

            } else {
                stickyArrow.parent().removeClass('sticky-arrow-absolute');
                stickyArrow.parent().css('bottom', '200px');

            }
            if (scroll < posFirstSection) {
                stickyArrow.removeClass('sticky-arrow-top');
                stickyArrow.addClass('sticky-arrow-bottom');
            }

        });
    });
});

/// Clients slider ///
$(document).ready(function () {
    var slider = new Swiper(".clients-carousel__slider", {
        grabCursor: true,
        speed     : 500,
        loop      : true,
        autoplay  : true,
    });
});

/// Service slider ///
jQuery(function ($) {
    $(document).ready(function () {
        var owlCarousel = $('.services-slider__items.owl-carousel');

        owlCarousel.imagesLoaded(function () {
            owlCarousel.on('initialized.owl.carousel', function (event) {
                $('.services-slider__item').addClass('opacity');
            });

            owlCarousel.owlCarousel({
                items     : 1,
                loop      : false,
                autoplay  : false,
                smartSpeed: 2000,
                nav       : false,
                margin    : 0,
                autoWidth : false,
                responsive: {
                    768 : {
                        items    : 2,
                        autoWidth: false,
                    },
                    1024: {
                        items    : 3,
                        autoWidth: false,
                    },
                    1200: {
                        items    : 4,
                        autoWidth: false,
                    },
                    2000: {
                        items    : 4,
                        margin   : 262,
                        autoWidth: true,
                    },
                }
            });
        });
    });
});

/// Gallery slider ///
jQuery(function ($) {
    $(document).ready(function () {

        var owlCarouselGallery = $('.gallery-slider__items.owl-carousel');


        owlCarouselGallery.imagesLoaded(function () {

            owlCarouselGallery.on('initialized.owl.carousel', function (event) {
                $('.gallery-slider__item').addClass('opacity');
            });

            owlCarouselGallery.owlCarousel({
                items     : 1,
                loop      : true,
                autoplay  : true,
                smartSpeed: 2000,
                nav       : false,
                margin    : 22,
                autoWidth : true,
                autoHeight: true,
                responsive: {
                    994 : {
                        margin: 80,
                    },
                    1400: {
                        margin: 140,
                    },
                }

            });
        });
    });
});

/// Sponsors slider ///
jQuery(function ($) {
    $(document).ready(function () {
        const swiper = new Swiper('.gallery-slider__items_test', {
            loop    : true,
            autoplay: {
                delay: 5000,
            },
        });

        var owlCarousel = $('.sponsors__items.owl-carousel.left');
        var owlCarouselRight = $('.sponsors__items.owl-carousel.right');

        owlCarousel.imagesLoaded(function () {
            owlCarousel.on('initialized.owl.carousel', function (event) {
                $('.sponsors__item').addClass('opacity');
            });

            owlCarousel.owlCarousel({
                items          : 2,
                loop           : true,
                autoplay       : true,
                nav            : false,
                margin         : 40,
                autoWidth      : false,
                autoplayTimeout: 0,
                smartSpeed     : 4000,
                slideTransition: 'linear',
                mouseDrag      : false,
                responsive     : {
                    768: {
                        items    : 9,
                        margin   : 40,
                        autoWidth: true,
                        mouseDrag: false,
                    },
                }
            });
        });

        owlCarouselRight.imagesLoaded(function () {
            owlCarouselRight.on('initialized.owl.carousel', function (event) {
                $('.sponsors__item').addClass('opacity');
            });

            owlCarouselRight.owlCarousel({
                items          : 2,
                loop           : true,
                autoplay       : true,
                nav            : false,
                margin         : 40,
                rtl            : true,
                autoWidth      : false,
                autoPlayTimeout: 100,
                autoplaySpeed  : 5000,
                slideTransition: 'linear',
                mouseDrag      : false,
                responsive     : {
                    768: {
                        items    : 9,
                        margin   : 40,
                        autoWidth: true,
                        mouseDrag: false,
                    },
                }
            });
        });


        $('.archive-cases__main-content').imagesLoaded(function () {
            $('.archive-cases__main-content').masonry({
                itemSelector      : '.latest-cases__item',
                transitionDuration: 0
            });
        });

    });
});

/// Cases Filter ///
jQuery(function ($) {
    $(document).ready(function () {
        var theme = filters_ajax.url;
        var categoryItems = $('.archive-cases__filter__item');
        var itemsWrapper = $('.archive-cases__main-content');
        categoryItems.each(function () {
            $(this).on('click', function (evt) {
                evt.preventDefault();
                categoryItems.removeClass('active');
                $(this).addClass('active');
                var category = $(this).data('category');
                $.ajax({
                    url       : theme,
                    type      : "POST",
                    dataType  : "json",
                    data      : {
                        action  : "cases_filter",
                        category: category,
                    }, success: function (res) {
                        var data = res['posts'];
                        itemsWrapper.children('.latest-cases__item').remove();
                        itemsWrapper.append(data);
                        $('.archive-cases__main-content').imagesLoaded(function () {
                            itemsWrapper.masonry('reloadItems');
                            itemsWrapper.masonry();
                            $('.latest-cases__item').addClass('opacity');
                        });
                    }, error  : function () {
                        console.log('Error');
                    }
                })

            })
        })

    });
});

/// News Filter ///
jQuery(function ($) {
    $(document).ready(function () {
        var theme = filters_ajax.url;
        var categoryItems = $('.archive-news__filter__item');
        var itemsWrapper = $('.archive-news__main-content');
        categoryItems.each(function () {
            $(this).on('click', function (evt) {
                evt.preventDefault();
                categoryItems.removeClass('active');
                $(this).addClass('active');
                var category = $(this).data('category');
                $.ajax({
                    url       : theme,
                    type      : "POST",
                    dataType  : "json",
                    data      : {
                        action  : "news_filter",
                        category: category,
                    }, success: function (res) {
                        var data = res['posts'];
                        itemsWrapper.children('.latest-cases__item').remove();
                        itemsWrapper.append(data);
                    }, error  : function () {
                        console.log('Error');
                    }
                })

            })
        })

    });
});

/// Archive Cases Scroll ///
/*jQuery(function ($) {
    $(document).ready(function () {
        var theme = filters_ajax.url;
        var itemsWrapper = $('.archive-cases__main-content');
        $(window).on('scroll', function infinity() {
            var offset = $('.archive-cases__main-content').children('.latest-cases__item').length;
            var offsetBot = $(document).height() - 1550;
            var windowScroll = $(window).scrollTop();
            if (windowScroll > offsetBot) {
                $(window).off('scroll', infinity);
                var category = $('.archive-cases__filter__item.active').attr('data-category');
                $.ajax({
                    url       : theme,
                    type      : "POST",
                    dataType  : "json",
                    data      : {
                        action  : "cases_infinity",
                        offset  : offset,
                        category: category,
                    }, success: function (res) {
                        if (!res['last']) {
                            var data = res['posts'];
                            itemsWrapper.append(data);
                            itemsWrapper.masonry('reloadItems');
                            itemsWrapper.masonry();
                            $('.latest-cases__item').addClass('opacity');
                            $(window).on('scroll', infinity);
                        }
                    }, error  : function () {
                        console.log('Error');
                    }
                })

            }
        });
    });
});*/

/// Archive News Scroll ///
jQuery(function ($) {
    $(document).ready(function () {
        var theme = filters_ajax.url;
        var itemsWrapper = $('.archive-news__main-content');
        $(window).on('scroll', function infinity() {
            var offset = $('.archive-news__main-content').children('.latest-cases__item').length;
            var offsetBot = $(document).height() - 1550;
            var windowScroll = $(window).scrollTop();
            if (windowScroll > offsetBot) {
                $(window).off('scroll', infinity);
                var category = $('.archive-news__filter__item.active').attr('data-category');
                $.ajax({
                    url       : theme,
                    type      : "POST",
                    dataType  : "json",
                    data      : {
                        action  : "news_infinity",
                        offset  : offset,
                        category: category,
                    }, success: function (res) {
                        if (!res['last']) {
                            var data = res['posts'];
                            itemsWrapper.append(data);
                            $(window).on('scroll', infinity);
                        }
                    }, error  : function () {
                        console.log('Error');
                    }
                })

            }
        });
    });
});

/// Accordion ///
jQuery(function ($) {
    $(document).ready(function () {
        var accordionItems = $('.accordion__item');
        var accordionInfo = $('.accordion__info-item');
        accordionItems.each(function (i) {
            $(this).on('click mouseover', function () {
                accordionInfo.each(function (j) {
                    $(this).hide();
                    $(this).removeClass('opacity1');
                    if (i === j) {
                        $(this).show();
                        var thisElem = $(this);
                        $(thisElem).addClass('opacity1')
                    }
                })
            })
        });


        var accordionItemsServices = $('.services-main-module__item');
        var accordionInfoServices = '';
        if ($(window).width() > 924) {
            accordionInfoServices = $('.services-main-module__info-item.desc');
        }
        accordionItemsServices.each(function (i) {
            $(this).on('click', function () {
                accordionInfoServices.each(function (j) {
                    $(this).hide();
                    $(this).removeClass('opacity1');
                    if (i === j) {
                        $(this).show();
                        var thisElem = $(this);
                        $(thisElem).addClass('opacity1')
                    }
                })
            })
        });
    });
});

/// Audio module ///

(() => {
    var videoWrapper = document.querySelectorAll('.audio-player__wrapper');
    if (!videoWrapper.length) {
        return;
    }
    videoWrapper.forEach(wrapper => {
        let audio = wrapper.querySelector("#audio");
        let time = wrapper.querySelector(".time");
        let btnPlay = wrapper.querySelector(".play");
        let audioTrack = wrapper.querySelector(".audio-track");
        let btnPause = wrapper.querySelector(".pause");

        btnPlay.addEventListener("click", function () {
            btnPlay.classList.add('active')
            btnPause.classList.remove('active')
            audio.play();
            audioPlay = setInterval(function () {
                var audioTime = Math.round(audio.currentTime);
                var audioLength = Math.round(audio.duration)
                time.style.width = (audioTime * 100) / audioLength + '%';
            }, 10)
        });

        btnPause.addEventListener("click", function () {
            btnPlay.classList.remove('active')
            btnPause.classList.add('active')
            audio.pause();
            clearInterval(audioPlay)
        });

        audioTrack.addEventListener('click', e => {
            var audioTime = Math.round(audio.currentTime);
            var audioLength = Math.round(audio.duration)
            var rect = e.target.getBoundingClientRect();
            var x = e.clientX - rect.left;
            audio.currentTime = x * audio.duration / rect.width;
            audioTime = Math.round(audio.currentTime);
            time.style.width = (audioTime * 100) / audioLength + '%';
        })
    })
})();

(function () {
    let media = document.querySelectorAll("audio.fc-media");
    if (!media) {
        return;
    }
    media.forEach(e => {
        let audio = new MediaElementPlayer(e, {
            iconSprite              : "",
            audioHeight             : 40,
            features                : ["playpause", "progress"],
            alwaysShowControls      : true,
            timeAndDurationSeparator: "<span></span>",
            iPadUseNativeControls   : false,
            iPhoneUseNativeControls : false,
            AndroidUseNativeControls: false
        });
    })
})();

$('.archive-cases__grid').imagesLoaded(function () {
    $('.archive-cases__grid').css("opacity", "1");
});

/// Footer to top ///

(() => {
    $(document).ready(function () {
        $('.footer_top').click(
            function () {
                $('html, body').animate({
                    scrollTop: $('section:eq(0)').offset().top
                });
            }
        )
    });
})();


/// Hero Cases Animation ///

jQuery(function ($) {
    $(document).ready(function () {
        var i = 1;
        var cog = $('.hero-cases__wrapper');
        if (cog.length === 0) {
            cog = $('.hero-cases__module .hero-frame');
            if (cog.length === 0) {
                cog = $('.hero-cases__module .video__wrapper');
            }
        }
        var prevPosition = $(window).scrollTop();
        var posFirstSection = $('section:eq(1)').offset().top;


        $(window).scroll(function () {
            var currentPosition = $(window).scrollTop();
            if (currentPosition > 0) {
                prevPosition = currentPosition;
            }


            // console.log(currentPosition, 'curent:' + (1 - currentPosition * 0.001), 'curent-new:' + (1 - currentPosition * 0.0007));
            if (currentPosition < posFirstSection) {
                cog.css({
                    'transform'       : 'perspective(1000px) rotateX(' + (currentPosition / 10) + 'deg) scale(' + (1 - currentPosition * 0.0006) + ')',
                    'transform-origin': 'bottom'
                });
            }
            if (currentPosition > posFirstSection) {
                cog.addClass('opacity-none');
            } else {
                cog.removeClass('opacity-none');
            }
        });
    })
});

/// Map ///
function initMap()
{
    var maps = document.getElementById('map');
    if (maps) {
        var lat = +maps.dataset.lat;
        var lng = +maps.dataset.lng;
        var myLatLng = {lat, lng};
        var theme = filters_ajax.theme_uri;
        var markers = {
            icon: theme + "/dest/images/mapmodule.png"
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat, lng},
            zoom  : 16,
            styles: [
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers"    : [
                        {
                            "color": "#DCD0B7"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers"    : [
                        {
                            "visibility": "off"
                        }
                    ]
                },

                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers"    : [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers"    : [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers"    : [
                        {
                            "color": "#0e4f64"
                        },
                        {
                            "visibility": "off"
                        },
                        {
                            "saturation": "-1"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers"    : [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers"    : [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#EDE6D7"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers"    : [
                        {
                            "color": "#948059"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers"    : [
                        {
                            "color": "#EDE6D7"
                        },
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.stroke",
                    "stylers"    : [
                        {
                            "color": "#d5c7af"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels",
                    "stylers"    : [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers"    : [
                        {
                            "visibility": "off"
                        }
                    ]
                },
            ]
        });
        new google.maps.Marker({
            position: myLatLng,
            icon    : markers.icon,
            map,
            title   : "Map Marker",
        });
    }
}

///load video when ready ///
document.addEventListener('DOMContentLoaded', function () {
    (() => {
        var lazyLoad = document.querySelectorAll(".video-cases__shadow-wrapper iframe, .video__wrapper iframe," +
            " .text-double-video__video-item iframe, .text-mobile-video__video-item iframe," +
            " .text-and-image-video__right-block.video-right-block iframe ");

        var config = {
            root      : null,
            rootMargin: '30px',
            threshold : null
        };

        if (window.IntersectionObserver) {
            var observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.intersectionRatio > 0) {
                        entry.target.src = entry.target.dataset.src;
                        entry.target.removeAttribute("data-src");
                        observer.unobserve(entry.target);
                        entry.target.addEventListener('load', function () {
                            entry.target.parentElement.classList.add('video-ready');
                            entry.target.nextElementSibling.classList.add('loader-none');
                        })
                    }
                });
            }, config);
            lazyLoad.forEach(video => {
                observer.observe(video);
            });
        } else {
            lazyLoad.forEach(video => {
                let counter = 0;
                window.addEventListener('scroll', function () {
                    var scroll = window.pageYOffset + window.innerHeight;
                    var elPos = video.parentElement.offsetTop;
                    if (scroll > elPos && counter === 0) {
                        video.src = video.dataset.src;
                        video.removeAttribute("data-src");
                        video.addEventListener('load', function () {
                            video.parentElement.classList.add('video-ready');
                            video.nextElementSibling.classList.add('loader-none');
                        });
                        counter = 1
                    }
                });
            });
        }
    })();
});

/// mouseImage ///
jQuery(function ($) {
    $(document).ready(function () {
        var mouse;
        $(document).mousemove(function (pos) {
            if ($(window).width() > 768) {
                mouse = pos.originalEvent.pageY - $(document).scrollTop();
                if (pos.target.closest('.header-sticky .site-header') || pos.target.closest('.menu-toggle-btn') || pos.target.closest('.admin-popup') || pos.target.closest('.burger-bottom') || pos.target.closest('.cursor-none') || pos.target.closest('.coi-banner__wrapper')) {
                    if (pos.target.closest('.cases-template-default')) {
                        if (pos.target.closest('.video__wrapper') == $('.video__wrapper')[0]) {
                            $(".cursor-block").css('display', 'none');
                            return;
                        }
                    }
                    $(".cursor-block").css('left', (pos.pageX - 12) + 'px').css('top', (pos.pageY - 12) + 'px').css('display', 'block');
                } else {
                    $(".cursor-block").css('display', 'none');
                }
            }
        });
        $(document).scroll(function (pos) {
            if (document.body.classList.contains('cursor-none')) {
                if ($(window).width() > 768) {
                    $(".cursor-block").css('left', (pos.pageX - 12) + 'px').css('top', (mouse + $(document).scrollTop()) + 'px').css('display', 'block');
                }
            }
        });
    });
});

///video full screen///
jQuery(function ($) {
    $(document).ready(function () {
        var videoClick = $('.video__absolute:not(.not_full)');

        videoClick.on('click', function () {
            var parent = this.parentNode;
            parent.classList.toggle('videoFull');
            document.querySelector('body').classList.toggle('no-scroll');
            var video = parent.querySelector('iframe');
            if (video) {
                var src = video.src;
                video.src = video.dataset.toggle;
                video.dataset.toggle = src;
            } else {
                var videoUpload = $(this).parent().children('video');
                if ($(this).parent().hasClass('videoFull')) {
                    videoUpload.trigger('play');
                    videoUpload.removeAttr('autoplay');
                    videoUpload.prop('muted', false);
                    videoUpload[0].currentTime = 0;
                } else if (videoUpload.hasClass('autoplay')) {
                    videoUpload.trigger('play');
                    videoUpload.attr('autoplay', 'autoplay');
                    videoUpload.prop('muted', true);
                    videoUpload[0].currentTime = 0;
                } else {
                    videoUpload.trigger('pause');
                    videoUpload.prop('muted', true);
                    videoUpload[0].currentTime = 0;
                }
            }
        });
    });
});


///highlighted///
document.addEventListener('DOMContentLoaded', function () {
    var animation = bodymovin.loadAnimation({
        container: document.getElementById('hero__highlighted'),
        path     : '/wp-content/themes/marketsquare/dest/brands_txt.json',
        renderer : 'svg',
        loop     : true,
        autoplay : true
    });
    animation.addEventListener('DOMLoaded', function (e) {
        document.getElementById('hero__highlighted').setAttribute("style", "opacity:1; transform: translate3d(0, 0, 0)");
    });
});


///direct contact module Pop Up///
jQuery(function ($) {
    $(document).ready(function () {
        var adminLink = $('.admin-popup-link');
        var popUpClose = $('.popup-close');
        if (adminLink) {
            adminLink.on('click', function (e) {
                e.preventDefault();
                $(this).closest('.employees__item').toggleClass('admin-popup-wrapper-open');
            })
        }
        if (popUpClose) {
            popUpClose.each(function () {
                $(this).on('click', function () {
                    $(this).closest('.admin-popup-wrapper-open').removeClass('admin-popup-wrapper-open');
                })
            });
        }
    })
});
document.addEventListener('DOMContentLoaded', function () {

    (() => {
        let section = document.querySelectorAll('.resize-module');
        if (window.innerWidth <= 600) {
            section.forEach(el => {
                el.style.paddingTop = el.getAttribute('padding-mobile-top');
                el.style.paddingBottom = el.getAttribute('padding-mobile-bottom');
                el.style.marginTop = el.getAttribute('margin-mobile-top');
                el.style.marginBottom = el.getAttribute('margin-mobile-bottom');
            });
        }
        if (window.innerWidth >= 601 && window.innerWidth <= 992) {
            section.forEach(el => {
                el.style.paddingTop = el.getAttribute('padding-tablet-top');
                el.style.paddingBottom = el.getAttribute('padding-tablet-bottom');
                el.style.marginTop = el.getAttribute('margin-tablet-top');
                el.style.marginBottom = el.getAttribute('margin-tablet-bottom');
            });
        }
        if (window.innerWidth >= 993) {
            section.forEach(el => {
                el.style.paddingTop = el.getAttribute('padding-desktop-top');
                el.style.paddingBottom = el.getAttribute('padding-desktop-bottom');
                el.style.marginTop = el.getAttribute('margin-desktop-top');
                el.style.marginBottom = el.getAttribute('margin-desktop-bottom');
            });
        }
    })();
});