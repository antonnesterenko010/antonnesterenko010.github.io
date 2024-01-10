<?php
$fields = get_fields();

use ThemeOptions\Helpers;

?>
<section class="news-section ">
    <div class="block-container">
        <span class="block-subtitle"><?php echo Helpers::get($fields, 'subtitle') ?></span>
        <h2 class="block-title"><?php echo Helpers::get($fields, 'title') ?></h2>
        <div class="news-sub-section">

            <div class="swiper">

                <div class="news-block swiper-wrapper">
                    <?php foreach (Helpers::get($fields, 'news') as $prod) { ?>
                        <a href="<?php echo get_permalink($prod->ID) ?>" class="swiper-slide single-news-main">
                            <div class="news-image">
                                <?php echo get_the_post_thumbnail($prod->ID) ?>
                            </div>
                            <h3><?php echo get_the_title($prod->ID) ?></h3>
                            <?php if (has_excerpt($prod->ID)) { ?>
                                <p><?php echo mb_strimwidth(get_the_excerpt($prod->ID), 0, 107, '...'); ?></p>
                            <?php } ?>
                            <span class="news-link"><?php _e('Lees meer', 'oesterz'); ?></span>
                        </a>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-block-main-news">
        <div class="swiper-button-prev-news"></div>
        <div class="swiper-button-next-news"></div>
    </div>
</section>
