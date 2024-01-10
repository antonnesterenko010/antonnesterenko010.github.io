<?php
$gallerySqImage = get_sub_field('square_picture');
$gallerySqImageWebp = get_sub_field('square_picture_webp');
$galleryRSmallImage = get_sub_field('rectangular_small_picture');
$galleryRSmallImageWebp = get_sub_field('rectangular_small_picture_webp');
$galleryRBigImage = get_sub_field('rectangular_big_picture');
$galleryRBigImageWebp = get_sub_field('rectangular_big_picture_webp');
?>

<section class="gallery-contact__module">
    <div class="container-fluid max-width">
        <div class="gallery-contact__wrapper">
            <div class="gallery-contact__img-wrapper square">
                <?php
                get_template_part_var('templates/parts/picture',
                    [
                        'imageWeb' => $gallerySqImageWebp ? $gallerySqImageWebp['sizes']['large'] : '',
                        'image'    => $gallerySqImage ? $gallerySqImage['sizes']['large'] : '',
                    ]
                );
                ?>
            </div>
            <div class="gallery-contact__img-wrapper small-r">
                <?php
                get_template_part_var('templates/parts/picture',
                    [
                        'imageWeb' => $galleryRSmallImageWebp ? $galleryRSmallImageWebp['sizes']['large'] : '',
                        'image'    => $galleryRSmallImage ? $galleryRSmallImage['sizes']['large'] : '',
                    ]
                );
                ?>
            </div>
            <div class="gallery-contact__img-wrapper big-r">
                <?php
                get_template_part_var('templates/parts/picture',
                    [
                        'imageWeb' => $galleryRBigImageWebp ? $galleryRBigImageWebp['sizes']['large'] : '',
                        'image'    => $galleryRBigImage ? $galleryRBigImage['sizes']['large'] : '',
                    ]
                );
                ?>
            </div>
        </div>
    </div>
</section>
