<?php

use ThemeOptions\Helpers;

$title = get_sub_field('module_title');
$subtitle = get_sub_field('module_subtitle');
$blocks = get_sub_field('module_blocks');
$changeHeight = get_sub_field('change_module_height');

$paddingTopDesktop = $changeHeight['padding_top_desktop'] ? ' padding-desktop-top="' . $changeHeight['padding_top_desktop'] . 'px" ' : '';
$paddingBottomDesktop = $changeHeight['padding_bottom_desktop'] ? ' padding-desktop-bottom="' . $changeHeight['padding_bottom_desktop'] . 'px" ' : '';

$paddingTopTablet = $changeHeight['padding_top_tablet'] ? ' padding-tablet-top="' . $changeHeight['padding_top_tablet'] . 'px" ' : '';
$paddingBottomTablet = $changeHeight['padding_bottom_tablet'] ? ' padding-tablet-bottom="' . $changeHeight['padding_bottom_tablet'] . 'px" ' : '';

$paddingTopMobile = $changeHeight['padding_top_mobile'] ? ' padding-mobile-top="' . $changeHeight['padding_top_mobile'] . 'px" ' : '';
$paddingBottomMobile = $changeHeight['padding_bottom_mobile'] ? ' padding-mobile-bottom="' . $changeHeight['padding_bottom_mobile'] . 'px" ' : '';

$titleMaxWidth = $changeHeight['title_max_width'] ? 'style="max-width:' . $changeHeight['title_max_width'] . 'px;" ' : '';
$subtitleMaxWidth = $changeHeight['subtitle_max_width'] ? 'style="max-width:' . $changeHeight['subtitle_max_width'] . 'px;" ' : '';
?>

<section
        class="redesign-awards__module resize-module" <?php echo $paddingTopDesktop; ?> <?php echo $paddingBottomDesktop ?><?php echo $paddingTopTablet; ?> <?php echo $paddingBottomTablet ?><?php echo $paddingTopMobile; ?> <?php echo $paddingBottomMobile ?>>
    <div class="container-fluid max-width">
        <div class="awards__wrapper">
            <div class="awards__title__wrapper">
                <?php if ($title) : ?>
                    <h1 class="awards__title" <?php echo $titleMaxWidth ?>><?php echo $title ?></h1>
                <?php endif;
                if ($subtitle) :
                    ?>
                    <div class="awards__subtitle msq-body__large" <?php echo $subtitleMaxWidth ?>><?php echo $subtitle ?></div>
                <?php endif; ?>
            </div>
            <div class="awards__content__wrapper">
                <?php if ($blocks): ?>
                    <?php foreach ($blocks as $block) :
                        ?>
                        <div class="awards__content__item">
                            <?php if ($block['image']) : ?>
                                <picture class="awards__item__image">
                                    <source
                                            srcset="<?php echo $block['image']['url'] ?>"
                                            sizes="100vw"
                                            type="image/webp"
                                    >
                                    <img src="<?php echo $block['image']['url'] ?>" sizes="100vw"
                                         alt="<?php echo $block['image']['alt'] ?>">
                                </picture>
                            <?php endif;
                            ?>
                            <div class="awards__content">
                                <?php
                                if ($block['title']) : ?>
                                    <div class="awards__item__title msq-body"> <?php echo $block['title'] ?></div>
                                <?php endif;
                                if ($block['counter']) :
                                    ?>
                                    <div class="awards__item__counter msq-body"> <?php echo $block['counter'] ?></div>
                                <?php
                                endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
