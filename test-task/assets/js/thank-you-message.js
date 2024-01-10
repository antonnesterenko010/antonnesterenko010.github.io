"use strict";

document.addEventListener('wpcf7mailsent', function (event) {
  var target = event.target;
  var parentContainer = target.closest('.feedback-block__paper, .pricing-block__form-wrapper, .container');
  if (parentContainer) {
    var successMessages = parentContainer.querySelectorAll('.success-message');
    if (successMessages.length > 0) {
      successMessages.forEach(function (successMessage) {
        successMessage.classList.add('show');
      });
    }
  }
}, false);