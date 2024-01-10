<?php
$textColor = get_sub_field('text_color');
$clients = get_field('clients', 'options');
$carouselArr = get_sub_field('carousel');
$sectionBgColor = get_sub_field('section_bg_color');
$addCustomBgColor = get_sub_field('add_custom_section_bg');
$title = get_sub_field('module_title');

$changeHeight = get_sub_field('change_module_height');
$marginTopDesktop = $changeHeight['margin_top_desktop'] ? ' margin-desktop-top="'. $changeHeight['margin_top_desktop'] .'px" ' : '';
$marginBottomDesktop = $changeHeight['margin_bottom_desktop'] ? ' margin-desktop-bottom="'. $changeHeight['margin_bottom_desktop'] .'px" ' : '';

$marginTopTablet = $changeHeight['margin_top_tablet'] ? ' margin-tablet-top="'. $changeHeight['margin_top_tablet'] .'px" ' : '';
$marginBottomTablet = $changeHeight['margin_bottom_tablet'] ? ' margin-tablet-bottom="'. $changeHeight['margin_bottom_tablet'] .'px" ' : '';

$marginTopMobile = $changeHeight['margin_top_mobile'] ? ' margin-mobile-top="'. $changeHeight['margin_top_mobile'] .'px" ' : '';
$marginBottomMobile = $changeHeight['margin_bottom_mobile'] ? ' margin-mobile-bottom="'. $changeHeight['margin_bottom_mobile'] .'px" ' : '';

$paddingTopDesktop = $changeHeight['padding_top_desktop'] ? ' padding-desktop-top="'. $changeHeight['padding_top_desktop'] .'px" ' : '';
$paddingBottomDesktop = $changeHeight['padding_bottom_desktop'] ? ' padding-desktop-bottom="'. $changeHeight['padding_bottom_desktop'] .'px" ' : '';

$paddingTopTablet = $changeHeight['padding_top_tablet'] ? ' padding-tablet-top="'. $changeHeight['padding_top_tablet'] .'px" ' : '';
$paddingBottomTablet = $changeHeight['padding_bottom_tablet'] ? ' padding-tablet-bottom="'. $changeHeight['padding_bottom_tablet'] .'px" ' : '';

$paddingTopMobile = $changeHeight['padding_top_mobile'] ? ' padding-mobile-top="'. $changeHeight['padding_top_mobile'] .'px" ' : '';
$paddingBottomMobile = $changeHeight['padding_bottom_mobile'] ? ' padding-mobile-bottom="'. $changeHeight['padding_bottom_mobile'] .'px" ' : '';



?>

<section class="clients__module resize-module"
<?php echo $marginTopDesktop;?> <?php echo $marginBottomDesktop?><?php echo $marginTopTablet;?> <?php echo $marginBottomTablet?><?php echo $marginTopMobile;?> <?php echo $marginBottomMobile?>         style="<?php echo $addCustomBgColor === true ? 'background-color: ' . $sectionBgColor . ';' : ''?>">
    <div class="container-fluid max-width">
            <h3 class="msq-body clients__module-title <?php echo $textColor == 1 ? 'white' : '' ?>"><?php echo $title ? $title : '' ?></h3>
            <div class="clients__items resize-module" <?php echo $paddingTopDesktop;?> <?php echo $paddingBottomDesktop?><?php echo $paddingTopTablet;?> <?php echo $paddingBottomTablet?><?php echo $paddingTopMobile;?> <?php echo $paddingBottomMobile?>>
                <?php if ($clients): ?>
                    <?php foreach ($clients as $client) : ?>
                        <?php
                        $image = $client['clients_image'] ? $client['clients_image']['sizes']['sponsor_image'] : '';
                        ?>
                        <div class="clients__item">
                            <?php get_template_part_var('templates/parts/picture', ['imageWeb' => '', 'image' => $image]); ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
    </div>
</section>
