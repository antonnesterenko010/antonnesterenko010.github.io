
jQuery(document).ready(function ($) {
  $('.burger').click(function () {
    $(this).toggleClass('active');
    $('.header').toggleClass('active');
    $('body').toggleClass('overflow-hidden');
  });
  
  //modal window
  const modalCallbacks = Object.freeze({
    gameModal: (modal) => {
      const $modal = $(modal);
      $modal.find('.modal-content').html('<iframe src="' + $(modal).attr('data-src') + '"></iframe>');
      $modal.find('.modal-close').on('click', () => {
        $modal.find('.modal-content').html('')
      })
      $(modal).on('click', (e) => {
        if (!e.target.closest('.modal-window'))
          $modal.find('.modal-content').html('');
      })
    }
  });
  
  const showModal = (modalId) => {
    const $modal = $(modalId);
    const cb = $modal[0].dataset.callback;
    $('body').addClass('overflow-hidden')
    $modal.fadeIn();
    if (cb && modalCallbacks[cb])
      modalCallbacks[cb]($modal)
  }
  
  const hideModal = () => {
    $('.modal-overlay').fadeOut("fast", () => {
      $('body').removeClass('overflow-hidden');
    }).find('.modal-window').removeClass('fullscreen');
  }
  
  $('.page-template-page-registration').on('click', '.submit-btn', function (e) {
    e.preventDefault();
    $('.modal-overlay').fadeIn();
    $('body').addClass('overflow-hidden');
  });
  
  $('.modal-close, .modal-btn').on('click', function (e) {
    e.preventDefault();
    hideModal()
  });
  
  $('.modal-overlay').on('click', (e) => {
    e.stopPropagation();
    if (!e.target.closest('.modal-window'))
      hideModal()
  })
  
  if ($('[data-modal]').length) {
    $('[data-modal]').on('click', function (e) {
      e.preventDefault();
      showModal(this.dataset.modal)
    })
  }
  
  if ($('.modal-fullscreen').length) {
    $('.modal-fullscreen').on('click', function (e) {
      e.preventDefault();
      $(this.closest('.modal-window')).toggleClass('fullscreen')
    })
  }
  
});