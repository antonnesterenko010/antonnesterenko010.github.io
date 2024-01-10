<?php
$textColor = get_sub_field('text_color');
$titleBlock = get_sub_field('block_title');
$blockDesc = get_sub_field('block_desc');
$galleryItems = get_sub_field('gallery_items');
$addCustom = get_sub_field('add_custom_section_bg');
$bgAdd = styleControl();
?>

<section class="gallery-slider__module <?php echo $addCustom ? 'custom-mobile-pudding' : '' ?>" <?php echo $bgAdd ?>>
    <div class="container-fluid max-width">
        <div class="gallery-slider__top">
            <h2 class="gallery-slider__title"><?php echo $titleBlock ? $titleBlock : '' ?></h2>
            <div class="gallery-slider__buttons">
                <button class="owl-prev"></button>
                <div class="owl-counter"></div>
                <button class="owl-next"></button>
            </div>
        </div>

        <div class="gallery-slider__items owl-carousel">
            <?php foreach ($galleryItems as $galleryItem): ?>
                <?php
                $image = $galleryItem['gallery_image'] ? $galleryItem['gallery_image']['sizes']['2048x2048'] : '';
                $imageWeb = $galleryItem['gallery_image_webp'] ? $galleryItem['gallery_image']['sizes']['2048x2048'] : '';
                ?>
                <div class="gallery-slider__item">
                    <?php get_template_part_var('templates/parts/picture', ['imageWeb' => $imageWeb, 'image' => $image]); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
