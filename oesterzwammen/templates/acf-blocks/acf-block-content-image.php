<?php
$fields =get_fields();
use ThemeOptions\Helpers;
$position = 'right' == Helpers::get($fields, 'image_position') ? 'right-image' : ('left' == Helpers::get($fields, 'image_position') ? 'left-image' : '');
$full_width = 'yes' == Helpers::get($fields, 'full_width') ? 'full-width' : ('no' == Helpers::get($fields, 'full_width') ? '' : '');
$image_size = 'large' == Helpers::get($fields, 'content_image_size') ? 'large-size' : ('medium' == Helpers::get($fields, 'content_image_size') ? 'medium-size' : ('small' == Helpers::get($fields, 'content_image_size') ? 'small-size' : ''));

$marginTopDesktop = Helpers::get($fields,'content_image_margin_top_desktop') ? ' margin-desktop-top="'.Helpers::get($fields,'content_image_margin_top_desktop').'px" ' : '';
$marginBottomDesktop = Helpers::get($fields,'content_image_margin_bottom_desktop') ? ' margin-desktop-bottom="'.Helpers::get($fields,'content_image_margin_bottom_desktop').'px" ' : '';

$marginTopTablet = Helpers::get($fields,'content_image_margin_top_tablet') ? ' margin-tablet-top="'.Helpers::get($fields,'content_image_margin_top_tablet').'px" ' : '';
$marginBottomTablet = Helpers::get($fields,'content_image_margin_bottom_tablet') ? ' margin-tablet-bottom="'.Helpers::get($fields,'content_image_margin_bottom_tablet').'px" ' : '';

$marginTopMobile = Helpers::get($fields,'content_image_margin_top_mobile') ? ' margin-mobile-top="'.Helpers::get($fields,'content_image_margin_top_mobile').'px" ' : '';
$marginBottomMobile = Helpers::get($fields,'content_image_margin_bottom_mobile') ? ' margin-mobile-bottom="'.Helpers::get($fields,'content_image_margin_bottom_mobile').'px" ' : '';

$additional_class = Helpers::get($fields, 'content_image_additional_class');
?>
<section class="<?php echo $additional_class ?> content-image-block <?php echo $image_size?> resize-block <?php echo $full_width?>  block-container <?php echo $position ?> <?php echo Helpers::get($fields, 'block_type') == 'over' ? 'over-ons-block' : '';?> <?php echo Helpers::get($fields, 'background_image_position') == 'right' ? 'right-bg-image' : ''?>" <?php echo $marginTopDesktop;?> <?php echo $marginBottomDesktop?><?php echo $marginTopTablet;?> <?php echo $marginBottomTablet?><?php echo $marginTopMobile;?> <?php echo $marginBottomMobile?>>
    <?php if (Helpers::get($fields, 'add_background_image')){?>
        <img class="opacity-bg-image"
             src="<?php echo get_template_directory_uri() . '/dest/images/bg-image-opacity.png' ?>">
    <?php }?>
    <div class="content-block-main">
        <span class="block-subtitle"><?php echo Helpers::get($fields, 'subtitle') ?></span>
        <h1 class="block-title"><?php echo Helpers::get($fields, 'title')?></h1>
        <p class="description "><?php echo Helpers::get($fields, 'description')?></p>
        <?php if (Helpers::get($fields, 'link')){?>
        <a class="main-link" href="<?php echo Helpers::get($fields, 'link')['url']?>" target="<?php echo Helpers::get($fields, 'link')['target']?>"><?php echo Helpers::get($fields, 'link')['title']?></a>
        <?php }?>
    </div>
    <div class="image-block <?php echo Helpers::get($fields, 'image_content') == 'norm' ? 'normal-image' : 'absolut-image'?>">
        <?php echo wp_get_attachment_image(Helpers::get($fields, 'image')['ID'], 'full');?>
    </div>
</section>
