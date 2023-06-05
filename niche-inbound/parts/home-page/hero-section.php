<?php

$section_title = get_post_meta( get_the_ID(), 'hero_title', true );
$section_subtitle = get_post_meta( get_the_ID(), 'hero_subtitle', true );
$button_link = get_post_meta( get_the_ID(), 'hero_link', true );
$button_name = get_post_meta( get_the_ID(), 'hero_btn_name', true );

$entries = get_post_meta( get_the_ID(), 'hero_list', true );
?>
<section class="hero">
    <div class="container">
        <div class="hero-title heading-1 heading">
            <?php echo $section_title ?>
        </div>
        <div class="hero-subtitle heading-3 heading">
            <?php echo $section_subtitle?>
        </div>
        <a href="<?php echo $button_link ?>" class="hero-btn button"><span><?php echo $button_name ?></span></a>
    </div>
    <div class="swiper-container">
        <div class="hero-slider swiper-wrapper">

            <?php
            foreach ( (array) $entries as $key => $entry) {
            $slide_text = isset($entry['hero_item_title'])?$entry['hero_item_title']:"";
            ?>
                <div class="hero-slider-item swiper-slide">
                    <span><?php echo $slide_text ?></span>
                </div>
            <?php } ?>
        </div>
    </div>
</section>