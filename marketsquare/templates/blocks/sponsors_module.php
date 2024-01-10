<?php
$textColor = get_field('text_color_clients', 'options');
$sponsors = get_field('rows', 'options');
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

<section class="sponsors__module resize-module redesign"
<?php echo $marginTopDesktop;?> <?php echo $marginBottomDesktop?><?php echo $marginTopTablet;?> <?php echo $marginBottomTablet?><?php echo $marginTopMobile;?> <?php echo $marginBottomMobile?>>
    <div class="container-fluid max-width">
        <div class="sponsors__wrapper <?php echo $textColor == 1 ? 'white' : '' ?>">
            <h3 class="msq-body clients__module-title"><?php echo $title ? $title : '' ?></h3>
            <div class="sponsors__items resize-module"<?php echo $paddingTopDesktop;?> <?php echo $paddingBottomDesktop?><?php echo $paddingTopTablet;?> <?php echo $paddingBottomTablet?><?php echo $paddingTopMobile;?> <?php echo $paddingBottomMobile?>>

                <?php if ($sponsors): ?>
                    <?php foreach ($sponsors as $key => $items) :
                        $dir = $items['direction'] == 0 ? -1 : 1; ?>
                        <style>

                            @keyframes scroll_<?php echo $key;?> {
                                0% {
                                    transform: translateX(0);
                                }
                                100% {
                                    transform: translateX(calc(220px *<?php echo  count($items['sponsor_images']) ?> * <?php echo $dir?>));
                                }
                            }

                            .carousel__wrapper .carousel__slide_<?php echo $key;?> {
                                animation: scroll_<?php echo $key;?> var(--iteration-time) linear infinite;
                            }

                            @media (max-width: 768px) {
                                .right.carousel__wrapper_<?php echo $key;?> {
                                    width: calc(var(--no-of-slides) * var(--slide-width));
                                }
                            }
                        </style>
                        <div class="carousel__container">
                            <div class="carousel__wrapper carousel__wrapper_<?php echo $key ?> <?php echo $items['direction'] == 0 ? 'left' : 'right' ?>"
                                 style="<?php echo $items['direction'] == 0 ? 'width:100%' : 'width:max-content;' ?>">
                                <?php foreach ($items['sponsor_images'] as $sponsor): ?>

                                    <div class="carousel__slide carousel__slide_<?php echo $key ?>">
                                        <div class="carousel__image" style="background-image: url(<?php echo wp_get_attachment_image_url($sponsor['image'], 'full') ?>);"></div>
                                    </div>

                                <?php endforeach; ?>
                                <?php foreach ($items['sponsor_images'] as $sponsor): ?>

                                    <div class="carousel__slide carousel__slide_<?php echo $key ?>">
                                        <div class="carousel__image" style="background-image: url(<?php echo wp_get_attachment_image_url($sponsor['image'], 'full') ?>);"></div>
                                    </div>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>