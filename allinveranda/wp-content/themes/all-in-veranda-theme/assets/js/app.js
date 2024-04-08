document.addEventListener('DOMContentLoaded', function () {
    const siteHeader = document.querySelector('.header');
    const siteBurger = document.querySelector(".header__burger");

    siteBurger.addEventListener("click", function (event) {
        siteHeader.classList.toggle("active");
    });


    const catItems = document.querySelectorAll(".inspiratie__cat__item");
    const lists = document.querySelectorAll(".inspiratie__list");

    catItems.forEach(function (item) {
        item.addEventListener("click", function () {
            const attr = this.getAttribute("data-attr");

            catItems.forEach(function (item) {
                item.classList.remove("active");
            });
            this.classList.add("active");

            lists.forEach(function (list) {
                list.classList.add("hidden");
            });

            const targetList = document.querySelector(`.inspiratie__list[data-attr="${attr}"]`);
            if (targetList) {
                targetList.classList.remove("hidden");
            }
        });
    });
    const formTitles = document.querySelectorAll(".form__title");
    const formItems = document.querySelectorAll(".form__item");

    formTitles.forEach(function (title, index) {
        if (index !== 0) {
            title.classList.remove("active");
        }
    });

    formItems.forEach(function (item, index) {
        if (index !== 0) {
            item.classList.add("hidden");
        }
    });

    formTitles.forEach(function (title) {
        title.addEventListener("click", function () {
            const attr = this.getAttribute("data-attr");

            // Зберігаємо посилання на поточний title
            const currentTitle = this;

            formTitles.forEach(function (t) {
                if (t !== currentTitle) {
                    t.classList.remove("active");
                }
            });
            currentTitle.classList.add("active");

            formItems.forEach(function (item) {
                // Додаємо клас "hidden" усім елементам formItems, окрім обраного
                if (item.dataset.attr !== attr) {
                    item.classList.add("hidden");
                } else {
                    item.classList.remove("hidden");
                }
            });
        });
    });


    Fancybox.bind('[data-fancybox="gallery"]', {
    });
    const elements = document.querySelectorAll('.s_material,.v_material,.s_voorkant,.v_voorkant,.s_zijkanten,.v_zijkanten,.s_verlichting,.v_verlichting');

    elements.forEach(element => {
        NiceSelect.bind(element);
    });

});