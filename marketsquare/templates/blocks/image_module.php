<?php

$mainImage = get_sub_field('main_image');
$mainImageWebp = get_sub_field('main_image_webp');
$offsetTop = get_sub_field('offset_top');
$image = $mainImage ? $mainImage['sizes']['2048x2048'] : '';
$imageWeb = $mainImageWebp ? $mainImageWebp['sizes']['2048x2048'] : '';

?>

<section class="image__module  <?php echo $offsetTop ? 'offset-top' : '' ?>">
    <div class="container-fluid max-width">
        <div class="image__wrapper">
            <?php get_template_part_var('templates/parts/picture', ['imageWeb' => $imageWeb, 'image' => $image]); ?>
        </div>
    </div>
</section>

