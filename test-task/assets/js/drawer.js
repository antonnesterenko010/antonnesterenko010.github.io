"use strict";

(function ($) {
  $(function () {
    var _this = this;
    var burgerButton = $(".burger-button");
    var shadow = $(".shadow");
    var menu = $(".header__menu");
    var closeButton = $(".header__menu-close");
    var openBurger = function openBurger() {
      shadow.addClass("shadow--active");
      menu.addClass("header_menu__active");
      $("body").addClass("body-with-menu");
    };
    var closeBurger = function closeBurger() {
      shadow.removeClass("shadow--active");
      menu.removeClass("header_menu__active");
      $("body").removeClass("body-with-menu");
    };
    burgerButton.on("click", function () {
      openBurger();
    });
    closeButton.on("click", function () {
      closeBurger();
    });
    $(window).on("resize", function () {
      var windowSize = $(_this).width();
      if (windowSize > 992) {
        closeBurger();
      }
    });

    // Accordion
    var isAccordionInitialized = false;
    function accordionBlocks(block, content) {
      $(block).each(function () {
        var block = $(this);
        var $content = block.find(content);
        if (!$content.length) return;
        $(block).find(content).slideUp(1);
        $(block).on("click.collapse", function (event) {
          if ($(event.target).closest(content).length) {
            return;
          }
          if (!$(this).hasClass("active")) {
            event.preventDefault();
          }
          $(this).toggleClass("active");
          $(this).find(content).slideToggle(300);
          $(block).not(this).removeClass("active").find(content).slideUp(300);
        });
      });
    }
    function disableAccordion() {
      $(".js-accordion-block-mobile-only").off("click.collapse");
      $(".js-accordion-block-mobile-only").removeClass("active");
      $(".js-accordion-content-mobile-only").slideDown(300);
    }
    function checkScreenSize() {
      var screenWidth = window.innerWidth;
      if (screenWidth <= 768 && !isAccordionInitialized) {
        accordionBlocks(".js-accordion-block-mobile-only", ".js-accordion-content-mobile-only");
        isAccordionInitialized = true;
      } else if (screenWidth > 768 && isAccordionInitialized) {
        disableAccordion();
        isAccordionInitialized = false;
      }
    }
    window.addEventListener("resize", function () {
      checkScreenSize();
    });
    checkScreenSize();
    accordionBlocks(".js-accordion-menu-list>li", ".sub-menu");
    accordionBlocks(".js-accordion-block", ".js-accordion-content");

    //Scroll header
    // Check initial scroll position on page load
    var initialScroll = $(window).scrollTop();
    if (initialScroll >= 100) {
      $(".header").addClass("fixed__header");
    }

    // Scroll header
    $(window).scroll(function () {
      var scroll = $(window).scrollTop();
      if (scroll >= 100) {
        $(".header").addClass("fixed__header");
      } else {
        $(".header").removeClass("fixed__header");
      }
    });
  });
})(jQuery);