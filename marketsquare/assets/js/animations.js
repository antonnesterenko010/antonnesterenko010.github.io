class Animation
{
    constructor(containerSelector, args, scrollSettings = {}, to = false)
    {
        this.containerSelector = containerSelector;
        this.args = args;
        this.scrollSettings = scrollSettings;
        this.to = to;
        this.createAnimation();
    }

    containerBySelector()
    {
        return document.querySelectorAll(this.containerSelector);
    }

    createAnimation()
    {
        if (!this.containerBySelector()) {
            return;
        }
        gsap.utils.toArray(this.containerSelector).forEach(el => {
            var tl = gsap.timeline({
                scrollTrigger: {
                    trigger: el,
                    start  : "top 140%",
                    ...this.scrollSettings
                }
            });

            if (this.to) {
                tl.to(el, this.args);
            } else {
                tl.from(el, this.args);
            }
        });
    }
}

var $ = jQuery;
$('.archive-cases__grid').imagesLoaded(function () {
    gsap.registerPlugin(ScrollTrigger);
    new Animation('.latest-cases__item.all-left', {
        duration: 0.8, opacity: 0, y: 200, ease: "ease-in-out", clearProps: "all"
    });
    new Animation('.latest-cases__item.all-right', {
        duration: 1, opacity: 0, y: 350, ease: "ease-in-out", clearProps: "all"
    });
});

// $('.archive-cases__grid').imagesLoaded(function () {
//     gsap.utils.toArray('.latest-cases__item.all-left').forEach(el => {
//
//         gsap.set(el, {y: 200, opacity: .5})
//
//         gsap.to(el, {
//             duration     : 0.4, opacity: 1, y: 0, ease: "linear",
//             scrollTrigger: {
//                 trigger: el,
//             }
//         })
//     });
// })
