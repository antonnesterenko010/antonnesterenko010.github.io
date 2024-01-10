<?php
$imageBlock = get_sub_field('image');
$imageWebpBlock = get_sub_field('imagewebp');
$imageAlign = get_sub_field('image_align');
$addCustom = get_sub_field('add_custom_section_bg');
$bgAdd = styleControl();
?>

<section class="medium-image__module <?php echo $addCustom ? 'custom-mobile-pudding' : '' ?>" <?php echo $bgAdd?>>
    <div class="container-fluid max-width">
        <div class="medium-image__wrapper <?php echo $imageAlign === 'right' ? 'align-right' : '' ?>">
            <?php
            $image = $imageBlock ? $imageBlock['url'] : '';
            $imageWeb = $imageWebpBlock ? $imageWebpBlock['url'] : '';
            ?>
            <?php get_template_part_var('templates/parts/picture', ['imageWeb' => $imageWeb, 'image' => $image]); ?>
        </div>
    </div>
</section>
