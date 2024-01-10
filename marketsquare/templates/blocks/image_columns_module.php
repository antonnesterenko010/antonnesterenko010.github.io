<?php
$columnsCount = get_sub_field('image_columns');
$firstImage = get_sub_field('first_image');
$firstVideo = get_sub_field('video');
$firstType = get_sub_field('type');
$firstImageWebp = get_sub_field('first_image_webp');
$secondImage = get_sub_field('second_image');
$secondImageWebp = get_sub_field('second_image_webp');
$secondVideo = get_sub_field('video_second');
$secondType = get_sub_field('type_second');
$thirdImage = get_sub_field('third_image');
$thirdImageWebp = get_sub_field('third_image_webp');
$thirdVideo = get_sub_field('video_third');
$thirdType = get_sub_field('type_third');
$offsetTop = get_sub_field('offset_top');
$addCustom = get_sub_field('add_custom_section_bg');
$bgAdd = styleControl();
$firstImgAligment = get_sub_field('first_image_align');
$secondImgAligment = get_sub_field('second_image_align');
$thirdImgAligment = get_sub_field('third_image_align');
$fullScreen = get_sub_field('video_fullscreen');
$autoplay = get_sub_field('autoplay');
?>

<section class="image_columns__module  <?php echo $offsetTop ? 'offset-top' : '' ?> <?php echo $addCustom ? 'custom-mobile-pudding' : '' ?>" <?php echo $bgAdd ?>>
    <div class="container-fluid max-width">
        <div class="image_columns__wrapper">
            <div class="image_columns__item-wrapper <?php echo $columnsCount === '2' ? 'double-row' : '' ?>">
                <div class="image_columns__item" <?php echo 'style="align-items:' . $firstImgAligment . '"'; ?>>
                    <?php if ($firstType == 1): ?>
                        <video class="<?php echo $autoplay ? 'autoplay' : '' ?>" playsinline  loop muted width="100%" height="100%" <?php echo $autoplay ? 'autoplay="autoplay"' : '' ?>>
                            <source src="<?php echo $firstVideo ?>">
                        </video>
                        <div class="video__absolute <?php echo $fullScreen ? '' : 'not_full' ?>"></div>
                        <div class="video__mobile-close"></div>
                    <?php else: ?>
                        <?php get_template_part_var('templates/parts/picture',
                            ['imageWeb' => $firstImageWebp ? $firstImageWebp['url'] : '', 'image' => $firstImage ? $firstImage['url'] : '']); ?>
                    <?php endif; ?>
                </div>
                <div class="image_columns__item" <?php echo 'style="align-items:' . $secondImgAligment . '"'; ?>>
                    <?php if ($secondType == 1): ?>
                        <video  class="<?php echo $autoplay ? 'autoplay' : '' ?>" playsinline autoplay loop muted width="100%" height="100%" <?php echo $autoplay ? 'autoplay="autoplay"' : '' ?>>
                            <source src="<?php echo $secondVideo ?>">
                        </video>
                        <div class="video__absolute <?php echo $fullScreen ? '' : 'not_full' ?>"></div>
                        <div class="video__mobile-close"></div>
                    <?php else: ?>
                        <?php get_template_part_var('templates/parts/picture',
                            ['imageWeb' => $secondImageWebp ? $secondImageWebp['url'] : '', 'image' => $secondImage ? $secondImage['url'] : '']); ?>
                    <?php endif; ?>
                </div>
                <?php if ($columnsCount === '3') : ?>
                    <div class="image_columns__item" <?php echo 'style="align-items:' . $thirdImgAligment . '"'; ?>>
                        <?php if ($thirdType == 1): ?>
                            <video playsinline autoplay loop muted width="100%" height="100%">
                                <source src="<?php echo $thirdVideo ?>">
                            </video>
                        <?php else: ?>
                            <?php get_template_part_var('templates/parts/picture',
                                ['imageWeb' => $thirdImageWebp ? $thirdImageWebp['url'] : '', 'image' => $thirdImage ? $thirdImage['url'] : '']); ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
