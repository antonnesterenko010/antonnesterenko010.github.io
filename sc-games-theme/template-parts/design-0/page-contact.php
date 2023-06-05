<section class="content__form contact">
    <div class="container">
        <div class="content-block">
            <div class="content-title">
                <?php the_title(); ?>
            </div>
            <?php
            the_content();
            ?>
        </div>
    </div>
</section>

<div class="modal-overlay">
    <div class="modal-window">
        <div class="modal-close">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/close.svg" alt="star">
        </div>
        <div class="modal-content">
            <div class="decor">
                <div class="top-star star">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/modal-top-star.svg" alt="star">
                </div>
                <div class="bottom-star star">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/modal-bottom-star.svg" alt="star">
                </div>
            </div>
            <div class="modal-title">Thank you for your registration!</div>
            <div class="modal-btn">
                <div class="name">Ok</div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
