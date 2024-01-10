<?php
$fields = get_fields();

use ThemeOptions\Helpers;

$padding_top = Helpers::get($fields, 'padding_top') ? 'padding-top:' . Helpers::get($fields, 'padding_top') . 'px;' : '';
$padding_bottom = Helpers::get($fields, 'padding_bottom') ? 'padding-bottom:' . Helpers::get($fields, 'padding_bottom') . 'px;' : '';
$bg_color = Helpers::get($fields, 'background_color') ? 'background:' . Helpers::get($fields, 'background_color') . ';' : '';
$card_bg = Helpers::get($fields, 'card_background');
$title_color = Helpers::get($fields, 'title_color');
$description_color = Helpers::get($fields, 'description_color');
$shadow = Helpers::get($fields, 'card_shadow') ? 'shadow' : '';
?>
<section class="facts-section " style="<?php echo $bg_color; echo $padding_top; echo $padding_bottom; ?>">

    <div class="facts-sub-section block-container">
        <div class="swiper">

            <div class="facts-block swiper-wrapper">
                <?php foreach (Helpers::get($fields, 'facts') as $fact) { ?>
                    <div class="swiper-slide single-fact-main">
                        <div class="single-fact <?php echo $shadow; ?>"  style="background: <?php echo $card_bg; ?>">
                            <div class="fact-image">
                                <?php echo wp_get_attachment_image($fact['icon'], 'full') ?>
                            </div>
                            <h4 class="fact-title" style="color: <?php echo $title_color; ?>"><?php echo $fact['title'] ?></h4>
                            <span class="fact-description" style="color: <?php echo $description_color; ?>"><?php echo $fact['description'] ?></span>
                        </div>
                    </div>

                <?php } ?>
            </div>

        </div>
    </div>
    <?php if (Helpers::get($fields, 'slider_button')): ?>
    <div class="slider-block-main">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <?php endif; ?>
</section>
