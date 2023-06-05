<section class="page__content page-template-default">
    <div class="container">
        <?php if (get_the_title()) { ?>
            <div class="page__content-title main-title-big">
                <?php the_title(); ?>
            </div>
        <?php } ?>
        <div class="page__content-block">
            <?php the_content(); ?>
        </div>
    </div>
</section>