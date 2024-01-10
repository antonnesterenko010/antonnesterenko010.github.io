<?php
$fields = get_fields();

use ThemeOptions\Helpers;

$latestArgs = [
    'post_type' => 'post',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'

];

$latestPosts = new WP_Query($latestArgs);
?>
<section class="news-section ">
    <div class="block-container">

        <img class="opacity-bg-image"
             src="<?php echo get_template_directory_uri() . '/dest/images/bg-image-opacity.png' ?>">
        <span class="block-subtitle"><?php echo Helpers::get($fields, 'subtitle') ?></span>
        <h2 class="block-title"><?php echo Helpers::get($fields, 'title') ?></h2>
        <div class="news-sub-section">

            <div class="swiper">

                <div class="news-block swiper-wrapper">
                    <?php
                    if (Helpers::get($fields, 'show_latest')) {
                        if ($latestPosts->have_posts()) {
                            while ($latestPosts->have_posts()) {
                                $latestPosts->the_post();
                                ?>
                                <a href="<?php the_permalink(); ?>" class="swiper-slide single-news-main">
                                    <div class="public-date">
                                        <span><?php echo get_the_date('j'); ?></span>
                                        <span><?php echo get_the_date('M'); ?></span>
                                    </div>
                                    <div class="news-image">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                    <h3><?php the_title(); ?></h3>
                                    <?php if (has_excerpt()) : ?>
                                        <p><?php echo mb_strimwidth(get_the_excerpt(), 0, 107, '...'); ?></p>
                                    <?php endif; ?>
                                    <span class="news-link"><?php _e('Lees meer', 'oesterz'); ?></span>
                                </a>
                                <?php
                            }

                            wp_reset_postdata();
                        } else {
                            echo 'No posts found.';
                        }
                    } else {
                        foreach (Helpers::get($fields, 'news') as $prod) { ?>
                            <a href="<?php echo get_permalink($prod->ID) ?>" class="swiper-slide single-news-main">
                                <div class="public-date">
                                    <span><?php echo date_i18n('j', get_post_timestamp($prod->ID)); ?></span>
                                    <span><?php echo date_i18n('M', get_post_timestamp($prod->ID)); ?></span>
                                </div>
                                <div class="news-image">
                                    <?php echo get_the_post_thumbnail($prod->ID) ?>
                                </div>
                                <h3><?php echo get_the_title($prod->ID) ?></h3>
                                <?php if (has_excerpt($prod->ID)) { ?>
                                    <p><?php echo mb_strimwidth(get_the_excerpt($prod->ID), 0, 107, '...'); ?></p>
                                <?php } ?>
                                <span class="news-link"><?php _e('Lees meer', 'oesterz'); ?></span>
                            </a>

                        <?php }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-block-main-news">
        <div class="swiper-button-prev-news"></div>
        <div class="swiper-button-next-news"></div>
    </div>
</section>
