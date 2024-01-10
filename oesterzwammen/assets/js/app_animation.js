document.addEventListener('DOMContentLoaded', function () {
    gsap.registerPlugin(ScrollTrigger);

    new Animation('.latest_products__headings__title', {
        duration: 0.7, opacity: 0, x:-200, ease: "linear", clearProps: "all"
    });

    gsap.from('.hero_module__title',  {  duration: 0.7, opacity: 0, x:-200, ease: "linear", clearProps: "all"});

})


