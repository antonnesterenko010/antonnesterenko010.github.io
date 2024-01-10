<?php

use ThemeOptions\Helpers;
$title = get_sub_field('module_title');
$subtitle = get_sub_field('module_subtitle');
$displayImage = get_sub_field('display_image');
$button = get_sub_field('module_link');
$changeHeight = get_sub_field('change_module_height');

$paddingTopDesktop = $changeHeight['padding_top_desktop'] ? ' padding-desktop-top="'. $changeHeight['padding_top_desktop'] .'px" ' : '';
$paddingBottomDesktop = $changeHeight['padding_bottom_desktop'] ? ' padding-desktop-bottom="'. $changeHeight['padding_bottom_desktop'] .'px" ' : '';

$paddingTopTablet = $changeHeight['padding_top_tablet'] ? ' padding-tablet-top="'. $changeHeight['padding_top_tablet'] .'px" ' : '';
$paddingBottomTablet = $changeHeight['padding_bottom_tablet'] ? ' padding-tablet-bottom="'. $changeHeight['padding_bottom_tablet'] .'px" ' : '';

$paddingTopMobile = $changeHeight['padding_top_mobile'] ? ' padding-mobile-top="'. $changeHeight['padding_top_mobile'] .'px" ' : '';
$paddingBottomMobile = $changeHeight['padding_bottom_mobile'] ? ' padding-mobile-bottom="'. $changeHeight['padding_bottom_mobile'] .'px" ' : '';

$titleMaxWidth = $changeHeight['title_max_width'] ? 'style="max-width:'. $changeHeight['title_max_width'] .'px;" ' : '';
$subtitleMaxWidth = $changeHeight['subtitle_max_width'] ? 'style="max-width:'. $changeHeight['subtitle_max_width'] .'px;" ' : '';

$mediaWidth = $changeHeight['media_width'];
$mediaHeight = $changeHeight['media_height'];

$mediaType = get_sub_field('media_type');

$image = '';
$src = '';

switch ($mediaType) {
    case 'image':
        $image = get_sub_field('module_image');
        break;
    case 'upload':
        $src = get_sub_field('video_upload');
        break;
    case 'url23':
        $src = get_sub_field('video_23');
        break;
    case 'vimeo':
        $src = get_sub_field('vimeo');
        break;
}
?>

<section class="text-with-image-button__module resize-module" <?php echo $paddingTopDesktop;?> <?php echo $paddingBottomDesktop?><?php echo $paddingTopTablet;?> <?php echo $paddingBottomTablet?><?php echo $paddingTopMobile;?> <?php echo $paddingBottomMobile?>
    style="--media-width:<?php echo $mediaWidth; ?>px;
            --media-height:<?php echo $mediaHeight; ?>px;">
    <div class="container-fluid max-width">
        <div class="twib__module">
            <?php if ($subtitle) : ?>
            <h3 class="msq-body twib__subtitle"><?php echo $subtitle ?></h3>
            <?php endif;?>
            <div class="twib__wrapper">
                <div class="twib__content">
                    <?php if ($title) : ?>
                        <div class="twib__title msq-body__large" <?php echo $titleMaxWidth?>><?php echo $title ?></div>
                    <?php endif;
                        if ($button) :
                    ?>
                    <a class="twib__link link-arrow msq-body desktop" href="<?php echo $button['link']?>">
                        <?php echo $button['title']?>
                        <?php get_template_part_var('templates/parts/redesign-arrow'); ?>
                    </a>
                    <?php endif;?>
                </div>
                <div class="twib__media">
                    <?php if ($mediaType === 'image' && $image) : ?>
                        <picture class="twib__image">
                            <source
                                    srcset="<?php echo $image['url'] ?>"
                                    sizes="100vw"
                                    type="image/webp"
                            >
                            <img src="<?php echo $image['url']?>" sizes="100vw" alt="<?php echo $image['alt']?>">
                        </picture>
                    <?php elseif ($mediaType === 'upload' && $src) : ?>
                        <video class="video__wrapper mobile" playsinline autoplay loop muted width="100%" height="100%">
                            <source src="<?php echo $src ?>">
                        </video>
                    <?php elseif ($mediaType === 'vimeo' && $src) : ?>
                        <?php
                        $pattern = '/\d+/';

                        if (preg_match($pattern, $src, $matches)) :
                            $id = $matches[0];

                            $source = 'https://player.vimeo.com/video/' . $id . '?autoplay=1&muted=1'; ?>
                            <iframe src="<?php echo $source; ?>" data-src="<?php echo $source; ?>" width="640" height="360" frameborder="0"
                                    allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                        <?php endif; ?>
                    <?php elseif ($mediaType === 'video_23' && $src) : ?>
                        <iframe class="hero-frame" src="<?php echo $src ?>"></iframe>
                    <?php endif;?>
                </div>
                <a class="twib__link link-arrow msq-body mobile" href="<?php echo $button['link']?>">
                    <?php echo $button['title']?>
                    <?php get_template_part_var('templates/parts/redesign-arrow'); ?>
                </a>
            </div>
        </div>
    </div>
</section>
