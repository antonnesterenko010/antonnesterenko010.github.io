<?php
$mainImage = get_sub_field('image');
$mainImageWebp = get_sub_field('image_webp');
$image = $mainImage ? $mainImage['sizes']['image-full-width-cases'] : '';
$imageWebp = $mainImageWebp ? $mainImageWebp['sizes']['image-full-width-cases'] : '';
$addCustom = get_sub_field('add_custom_section_bg');
$bgAdd = styleControl();
?>

<section class="image-full-width__module <?php echo $addCustom ? 'custom-mobile-pudding' : '' ?>" <?php echo $bgAdd?>>
    <div class="container-fluid max-width">
        <div class="image-full-width__content">
            <?php if($imageWebp):?>
                <?php echo wp_get_attachment_image($mainImageWebp['ID'], 'full')?>
            <?php else:?>
                <?php echo wp_get_attachment_image($mainImage['ID'], 'full')?>
            <?php endif;?>
        </div>
    </div>
</section>
