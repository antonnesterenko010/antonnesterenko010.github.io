<?php

use ThemeOptions\Helpers;
$title = get_sub_field('module_title');
$subtitle = get_sub_field('module_subtitle');
$image = get_sub_field('module_image');
$displayImage = get_sub_field('display_image');
$imageHeight = get_sub_field('image_height') ? 'style="--twi-image-height:' . get_sub_field('image_height') . 'px;"' : '';
$changeHeight = get_sub_field('change_module_height');

$paddingTopDesktop = $changeHeight['padding_top_desktop'] ? ' padding-desktop-top="'. $changeHeight['padding_top_desktop'] .'px" ' : '';
$paddingBottomDesktop = $changeHeight['padding_bottom_desktop'] ? ' padding-desktop-bottom="'. $changeHeight['padding_bottom_desktop'] .'px" ' : '';

$paddingTopTablet = $changeHeight['padding_top_tablet'] ? ' padding-tablet-top="'. $changeHeight['padding_top_tablet'] .'px" ' : '';
$paddingBottomTablet = $changeHeight['padding_bottom_tablet'] ? ' padding-tablet-bottom="'. $changeHeight['padding_bottom_tablet'] .'px" ' : '';

$paddingTopMobile = $changeHeight['padding_top_mobile'] ? ' padding-mobile-top="'. $changeHeight['padding_top_mobile'] .'px" ' : '';
$paddingBottomMobile = $changeHeight['padding_bottom_mobile'] ? ' padding-mobile-bottom="'. $changeHeight['padding_bottom_mobile'] .'px" ' : '';

$titleMaxWidth = $changeHeight['title_max_width'] ? 'style="max-width:'. $changeHeight['title_max_width'] .'px;" ' : '';
$subtitleMaxWidth = $changeHeight['subtitle_max_width'] ? 'style="max-width:'. $changeHeight['subtitle_max_width'] .'px;" ' : '';
?>

<section class="text-with-image__module resize-module" <?php echo $paddingTopDesktop;?> <?php echo $paddingBottomDesktop?><?php echo $paddingTopTablet;?> <?php echo $paddingBottomTablet?><?php echo $paddingTopMobile;?> <?php echo $paddingBottomMobile?>>
    <div class="container-fluid max-width">
        <div class="twi__module">
            <?php if ($title) : ?>
            <h1 class="twi__title" <?php echo $titleMaxWidth?>><?php echo $title ?></h1>
            <?php endif;?>
            <div class="twi__content">
                <?php if ($subtitle) : ?>
                <div class="twi__subtitle msq-body__large" <?php echo $subtitleMaxWidth?>><?php echo $subtitle ?></div>
                <?php endif;?>
                <?php if ($displayImage === 'yes') : ?>
                    <picture class="twi__image" <?php echo $imageHeight?>>
                        <source srcset="<?php echo $image['url'] ?>" sizes="100vw" type="image/webp">
                        <img src="<?php echo $image['url']?>" sizes="100vw" alt="<?php echo $image['alt']?>">
                    </picture>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
