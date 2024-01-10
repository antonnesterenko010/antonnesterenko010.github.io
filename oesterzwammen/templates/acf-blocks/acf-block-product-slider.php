<?php
$fields = get_fields();

use ThemeOptions\Helpers;

?>
<section class="product-section ">
    <div class="block-container">
        <img class="opacity-bg-image"
             src="<?php echo get_template_directory_uri() . '/dest/images/bg-image-opacity.png' ?>">

        <?php if (Helpers::get($fields, 'product_section_subtitle')) { ?>
            <span class="block-subtitle"><?php echo Helpers::get($fields, 'product_section_subtitle') ?></span>
        <?php } ?>

        <?php if (Helpers::get($fields, 'product_section_title')) { ?>
            <h2 class="block-title"><?php echo Helpers::get($fields, 'product_section_title') ?></h2>
        <?php } ?>
    </div>

    <div class="product-sub-section block-container">
        <div class="swiper">

            <div class="product-block swiper-wrapper">
                <?php foreach (Helpers::get($fields, 'products') as $prod) { ?>
                    <div class="swiper-slide single-product-main">
                        <div class="prod-image">
                            <?php echo get_the_post_thumbnail($prod->ID) ?>
                        </div>
                        <h3><?php echo get_the_title($prod->ID) ?></h3>
                        <?php if (has_excerpt($prod->ID)) { ?>
                            <p><?php echo get_the_excerpt($prod->ID) ?></p>
                        <?php } ?>
                        <a class="main-link"
                           href="<?php echo get_permalink($prod->ID) ?>"><?php _e('bekijk product', 'oesterz'); ?></a>
                    </div>

                <?php } ?>
            </div>

        </div>
    </div>
    <!--    <div class="slider-block-main">-->
    <!--        <div class="swiper-button-prev"></div>-->
    <!--        <div class="swiper-button-next"></div>-->
    <!--    </div>-->

</section>
