<?php

use ThemeOptions\Helpers;

$content = get_sub_field('content');
$repeater = get_sub_field('repeater');
$changeHeight = get_sub_field('change_module_height');

$paddingTopDesktop = $changeHeight['padding_top_desktop'] ? ' padding-desktop-top="'. $changeHeight['padding_top_desktop'] .'px" ' : '';
$paddingBottomDesktop = $changeHeight['padding_bottom_desktop'] ? ' padding-desktop-bottom="'. $changeHeight['padding_bottom_desktop'] .'px" ' : '';

$paddingTopTablet = $changeHeight['padding_top_tablet'] ? ' padding-tablet-top="'. $changeHeight['padding_top_tablet'] .'px" ' : '';
$paddingBottomTablet = $changeHeight['padding_bottom_tablet'] ? ' padding-tablet-bottom="'. $changeHeight['padding_bottom_tablet'] .'px" ' : '';

$paddingTopMobile = $changeHeight['padding_top_mobile'] ? ' padding-mobile-top="'. $changeHeight['padding_top_mobile'] .'px" ' : '';
$paddingBottomMobile = $changeHeight['padding_bottom_mobile'] ? ' padding-mobile-bottom="'. $changeHeight['padding_bottom_mobile'] .'px" ' : '';

?>

<section class="about__module redesign-about resize-module" <?php echo $paddingTopDesktop;?> <?php echo $paddingBottomDesktop?><?php echo $paddingTopTablet;?> <?php echo $paddingBottomTablet?><?php echo $paddingTopMobile;?> <?php echo $paddingBottomMobile?>>
    <div class="container-fluid max-width">
        <div class="about__module__wrapper">
            <div class="about__module__wrapper__content msq-display" style="max-width: <?php echo !empty($changeHeight['max_width']) ? $changeHeight['max_width'] . 'px' : ''; ?>;">
                <?php echo $content; ?>
            </div>
            <div id="cursor-about"></div>
            <div class="about__module__wrapper__media d-none">
                <?php if ($repeater): ?>
                    <?php foreach ($repeater as $item):
                        if (!empty($item['media']['url'])): ?>
                            <p><?php echo $item['media']['url'] ?></p>
                        <?php endif;
                    endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
