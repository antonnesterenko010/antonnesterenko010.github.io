<?php

use ThemeOptions\Helpers;
$preheader = get_sub_field('module_preheader');
$title = get_sub_field('module_title');
$subtitle = get_sub_field('module_subtitle');
$blocks = get_sub_field('module_blocks');
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

<section class="usp__liste__module resize-module" <?php echo $paddingTopDesktop;?> <?php echo $paddingBottomDesktop?><?php echo $paddingTopTablet;?> <?php echo $paddingBottomTablet?><?php echo $paddingTopMobile;?> <?php echo $paddingBottomMobile?>>
    <div class="container-fluid max-width">
        <div class="usp__module">
            <?php if ($preheader) : ?>
                <h3 class="msq-body usp__preheader"><?php echo $preheader ?></h3>
            <?php endif;?>
            <div class="usp__title__wrapper">
                <?php if ($title) : ?>
                    <h2 class="usp__title" <?php echo $titleMaxWidth?>><?php echo $title ?></h2>
                <?php endif;
                if ($subtitle) :
                    ?>
                    <div class="usp__subtitle msq-body__large" <?php echo $subtitleMaxWidth?>><?php echo $subtitle ?></div>
                <?php endif;?>
            </div>
            <div class="usp__content__wrapper">
                    <?php if ($blocks): ?>
                        <?php foreach ($blocks as $block) :
                            ?>
                            <div class="usp__content__item">
                                <?php if($block['title']) : ?>
                                <h3 class="usp__item__title"> <?php echo $block['title']?></h3>
                                <?php endif; ?>
                                <div class="usp__content">
                                    <?php if($block['wysiwyg']) : ?>
                                        <div class="usp__item__wysiwyg msq-body"><?php echo $block['wysiwyg']?></div>
                                    <?php endif;
                                    if ($block['link']['title']) :
                                        ?>
                                        <a class="usp__item__link link-arrow msq-body" href="<?php echo $block['link']['url'] ?>">
                                            <?php echo $block['link']['title'] ?>
                                            <?php get_template_part_var('templates/parts/redesign-arrow'); ?>
                                        </a>
                                    <?php endif;?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
            </div>
        </div>
    </div>
</section>
