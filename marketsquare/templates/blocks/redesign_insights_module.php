<?php
$title = get_sub_field('module_title');
$subtitle = get_sub_field('module_subtitle');

$blocks = get_sub_field('blocks');
$changeHeight = get_sub_field('change_module_height');
$marginTopDesktop = $changeHeight['margin_top_desktop'] ? ' margin-desktop-top="'. $changeHeight['margin_top_desktop'] .'px" ' : '';
$marginBottomDesktop = $changeHeight['margin_bottom_desktop'] ? ' margin-desktop-bottom="'. $changeHeight['margin_bottom_desktop'] .'px" ' : '';

$marginTopTablet = $changeHeight['margin_top_tablet'] ? ' margin-tablet-top="'. $changeHeight['margin_top_tablet'] .'px" ' : '';
$marginBottomTablet = $changeHeight['margin_bottom_tablet'] ? ' margin-tablet-bottom="'. $changeHeight['margin_bottom_tablet'] .'px" ' : '';

$marginTopMobile = $changeHeight['margin_top_mobile'] ? ' margin-mobile-top="'. $changeHeight['margin_top_mobile'] .'px" ' : '';
$marginBottomMobile = $changeHeight['margin_bottom_mobile'] ? ' margin-mobile-bottom="'. $changeHeight['margin_bottom_mobile'] .'px" ' : '';



?>

<section class="insights__module resize-module"
<?php echo $marginTopDesktop;?> <?php echo $marginBottomDesktop?><?php echo $marginTopTablet;?> <?php echo $marginBottomTablet?><?php echo $marginTopMobile;?> <?php echo $marginBottomMobile?>>
    <div class="container-fluid max-width">
        <?php if($subtitle) : ?>
        <h3 class="msq-body insights__subtitle "><?php echo $subtitle ?></h3>
        <?php endif;?>
        <div class="insights__wrapper">
            <?php if($title) :?>
            <h2 class="insights__title"><?php echo $title ?></h2>
            <?php endif;?>
            <div class="insights__block__list">
                <?php if ($blocks): ?>
                    <?php foreach ($blocks as $block) :
                        $contentWidth = $block['content_width'];
                        ?>
                        <div class="insights__block__item <?php echo $contentWidth?>">
                            <?php if($block['wysiwyg']) : ?>
                                <div class="insights__wysiwyg msq-body"><?php echo $block['wysiwyg']?></div>
                            <?php endif;
                            if ($block['link']['title']) :
                                ?>
                                <a class="insights__link link-arrow msq-body" href="<?php echo $block['link']['url'] ?>">
                                    <?php echo $block['link']['title'] ?>
                                    <?php get_template_part_var('templates/parts/redesign-arrow'); ?>
                                </a>
                            <?php endif;?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
