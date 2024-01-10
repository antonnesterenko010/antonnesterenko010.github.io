<?php
$image = get_field('single_wide_image', $id);
$imageHover = get_field('single_wide_hover', $id);
$imageWeb = '';
$imgTMP = true;


$casesLinkText = get_field('cases_text_link', $id);
$imageWide = get_post_meta($id, 'single_wide_image', true);
$imageWideHover = get_post_meta($id, 'single_wide_hover', true);
?>
<div class="latest-cases__item">
    <div class="latest-cases__img-wrapper">
        <a class="latest-cases__img-wrapper__desktop" href="<?php echo get_permalink($id) ?>">
            <?php echo wp_get_attachment_image($imageWide, 'full') ?>
            <div class="img-absolute" <?php echo $imageHover ? 'style="background-image:url(' . wp_get_attachment_image_url($imageWideHover, 'full') . ')"' : ''; ?>></div>
        </a>
        <a class="latest-cases__img-wrapper__mobile" href="<?php echo get_permalink($id) ?>">
            <?php echo wp_get_attachment_image($mob, 'full') ?>
        </a>
    </div>
    <a class="latest-cases__title-wrapper" href="<?php the_permalink($id); ?>">
        <h3 class="latest-cases__title">
            <?php echo get_the_title($id); ?>
        </h3>
    </a>
    <a class="latest-cases__link link-arrow" href="<?php the_permalink($id); ?>">
        <?php echo $casesLinkText ?>
        <?php get_template_part_var('templates/parts/arrow'); ?>
    </a>
</div>