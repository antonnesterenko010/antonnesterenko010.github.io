var $ = jQuery;
$(document).ready(function () {
    let currentPage = 6;
    let hasMoreItems = true;
    let loadMoreAreasBtn = jQuery('.posts-load-more__btn');
    let loadLessBtn = jQuery('.btn-load-less');
    loadMoreAreasBtn.on('click', loadMoreItems);
    loadLessBtn.on('click', loadLessItems);

    function loadLessItems() {
        const posts = $('.posts-list .post');
        posts.each((idx, el) => {
            if (idx > 2)  $(el).remove();
        })
        $('.posts').addClass('with-load-more');
        loadLessBtn.removeClass('show');
    }
    function loadMoreItems() {
        let loadMoreBtn = jQuery(this);
        loadMoreBtn.blur();

        if(window.innerWidth < 768) {
            var scrollTo = window.pageYOffset - (window.innerHeight - this.getBoundingClientRect().bottom);
            window.scrollTo(0, scrollTo);
        }

        let postID = jQuery(this).data('post');
        if (!hasMoreItems) {
            return;
        }

        jQuery.ajax({
            url: filters_ajax.url,
            type: 'POST',
            data: {
                action: 'load_more_posts',
                page: currentPage,
                postID: postID,
            },
            success: function (response) {
                if (response && response.success && response.data && response.data.html) {
                    jQuery('.posts-list').append(response.data.html);
                    currentPage++;
                    hasMoreItems = response.data.hasMoreItems;
                    $('.posts').removeClass('with-load-more');
                    if (!hasMoreItems) {
                        loadMoreBtn.addClass('disabled');
                    }
                    loadLessBtn.addClass('show');
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }
});
