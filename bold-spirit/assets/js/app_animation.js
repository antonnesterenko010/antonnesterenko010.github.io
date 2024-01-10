document.addEventListener('DOMContentLoaded', function () {
    const buttons = [
        document.querySelector('.hero__btn'),
        document.querySelector('.posts-load-more__btn')
    ];
    let tl = new gsap.timeline({paused:true});
    tl.add('start')
    tl.add('finish')
    tl.to(".btn__animated svg stop:nth-child(4)",{attr:{offset:0.7}, duration: 0.3},'start')
    tl.to(".btn__animated svg stop:nth-child(5)",{attr:{offset:0.8}, duration: 0.3},'start')
    tl.to(".btn__animated svg stop:nth-child(6)",{attr:{offset:0.9}, duration: 0.3},'start')
    tl.to(".btn__animated svg stop:nth-child(2)",{attr:{offset:0.6}, duration: 0.3},'start')
    tl.to(".btn__animated svg #paint0_linear_31_6071",{attr:{y2:180}, duration: 0.3},'start')


    buttons.forEach(button => {
        button.addEventListener('mouseenter', function () {
            tl.play();
        });
        button.addEventListener('mouseleave', function () {
            tl.reverse();
        });
    });

    /*(()=> {
        console.log(document.querySelector('html').clientWidth)
        if (document.querySelector('html').clientWidth < 551) {
            return
        }
        const images = document.querySelectorAll('.hero-cards-list .card');
        const indices = Array.from({ length: images.length }, (_, index) => index);
        let tl = new gsap.timeline();
        for (let i = indices.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [indices[i], indices[j]] = [indices[j], indices[i]];
        }
        indices.forEach((index, i) => {
            const image = images[index];
            tl.to(image.querySelector('img'), {
                duration:0.4,
                opacity: 0.15
            })
        });

    })();*/



})
