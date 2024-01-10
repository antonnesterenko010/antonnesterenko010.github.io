"use strict";

(function ($) {
  $(document).ready(function () {
    $("#js-tabs__nav li:first").addClass("active").trigger("click");
    $(".js-tabs__content .js-tab__content-box").not(":first").hide();
    $("#js-tabs__nav li").click(function () {
      var tabId = $(this).find("p").data("tab");
      if ($(this).hasClass('active')) {
        return false;
      }
      $(".js-tabs__content .js-tab__content-box").hide();
      $(tabId).fadeIn("slow");
      $("#js-tabs__nav li").removeClass("active");
      $(this).addClass("active");
      var index = $(this).index();
      var container = $("#js-tabs__nav");
      var scrollTo = $("#js-tabs__nav li").eq(index);
      container.animate({
        scrollLeft: scrollTo.position().left + container.scrollLeft() - container.width() / 2 + scrollTo.width() / 2
      }, 500);
      return false;
    });
  });
  function selectTab(element) {
    var $tabsContainer = $(element).closest(".js-tabs");
    $tabsContainer.find(".js-tabs-nav li").removeClass("active");
    $(element).addClass("active");
    $tabsContainer.find(".js-tab-content").hide();
    var selectedTab = $(element).attr("data-tab-selector");
    $tabsContainer.find(selectedTab).fadeIn();
    return false;
  }

  //Custom tab
  (function ($) {
    $(document).ready(function () {
      var $container = $(".js-tabs");
      $container.find(".js-tabs-nav li:first-child").addClass("active");
      $container.find(".js-tab-content").hide();
      $container.find(".js-tab-content:first").show();
      $container.on("click", ".js-tabs-nav li", function () {
        selectTab($(this));
      });
    });
  })(jQuery);

  //Custom select dropdown that dynamically renders content
  (function ($) {
    $(document).ready(function () {
      $(".js-content .js-selected-content").hide();
      $(".js-dropdown-menu li:first").hide();
      var defaultText = $(".js-dropdown-menu li:first").html();
      $(".js-dropdown-toggle").html(defaultText);
      $(".js-dropdown-toggle").on("click", function () {
        $(".js-dropdown-menu").slideToggle(300);
        $(this).toggleClass("open");
      });
      $(".js-dropdown-menu li").on("click", function () {
        var selectedTab = $(this).attr("data-tab-selector");
        var container = $(this).closest('.js-dropdown-toggler-wrapper');
        container.find(".js-content >div").hide();
        container.find(selectedTab).fadeIn(300);
        var newText = $(this).html();
        container.find(".js-dropdown-toggle").html(newText);
        container.find(".js-dropdown-menu li").show();
        $(this).hide();
        container.find(".js-dropdown-menu").slideUp(300);
        container.find(".dropdown-toggle").removeClass("open");
      });
    });
  })(jQuery);
  $(function () {
    $('[ href^="#"]').on('click', function (event) {
      var toElementSelector = $(this).attr('href');
      if (toElementSelector.length < 2) {
        return;
      }
      var toElement = $(toElementSelector);
      if (toElement.length) {
        event.preventDefault();
        var offset = 50;
        if (toElement.hasClass('js-tab-content')) {
          selectTab("[data-tab-selector=\"".concat(toElementSelector, "\"]"));
          offset = 250;
        }
        $([document.documentElement, document.body]).animate({
          scrollTop: $(toElement).offset().top - ($('.header').outerHeight() + offset)
        }, 2000);
      }
    });
  });
})(jQuery);