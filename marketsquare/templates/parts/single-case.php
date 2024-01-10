<?php
$bgType = get_field('background_type', $query->post->ID);
$bgVideo = get_field('video', $query->post->ID);
$additionFormat = get_field('additional_picture_format', $query->post->ID);
$additionFormatWebp = get_field('additional_picture_format_webp', $query->post->ID);
$casesImgWebp = get_field('thumbnail_webp', $query->post->ID);
$additionHoverFormat = get_field('additional_picture_format_for_hover_image', $query->post->ID);
if (!isset($first)) {
    $first = false;
}

if (isset($first) && $first) {
    $image = get_the_post_thumbnail($query->post->ID, $imgSize, ['loading' => false]);
    $imageWeb = $casesImgWebp ? $casesImgWebp['sizes'][$imgSize] : '';
    $imgTMP = true;
} else if ($additionFormat) {
    $image = $additionFormat ? $additionFormat['sizes'][$addSize] : '';
    $imageWeb = $additionFormatWebp ? $additionFormatWebp['sizes'][$addSize] : '';
    $imgTMP = false;
} else {
    $image = get_the_post_thumbnail($query->post->ID, $imgSize, ['loading' => false]);
    $imageWeb = $casesImgWebp ? $casesImgWebp['sizes'][$imgSize] : '';
    $imgTMP = true;
}

$casesLinkText = get_field('cases_text_link', $query->post->ID);

if (isset($additionHoverFormat) && $additionHoverFormat && !$first) {
    $imageHover = $additionHoverFormat;
    $imgSize = $addSize;
} else {
    $imageHover = get_field('hover_image', $query->post->ID);
}

$numElseLeft = $key % 2 === 0 ? 'all-left' : '';
$numElseRight = $key % 2 != 0 ? 'all-right' : '';
$term_obj_list = wp_get_post_categories($query->post->ID);
?>
<div class="latest-cases__item <?php echo $numElseLeft . ' ' . $numElseRight ?>">
    <div class="latest-cases__img-wrapper">
        <a href="<?php echo get_permalink($query->post->ID) ?>">
            <?php if ($bgType == 1) { ?>
                <video playsinline loop muted autoplay>
                    <source src="<?php echo wp_get_attachment_url($bgVideo); ?>">
                </video>
            <?php } else { ?>
                <?php get_template_part_var('templates/parts/picture', ['imageWeb' => $imageWeb, 'image' => $image, 'thumbnail' => $imgTMP]); ?>
                <div class="img-absolute" <?php echo $imageHover ? 'style="background-image:url(' . $imageHover['sizes']['1536x1536'] . ')"' : ''; ?>></div>
            <?php } ?>
        </a>
    </div>
    <?php if (have_rows('content', $query->post->ID)):
        while (have_rows('content', $query->post->ID)): the_row();
            if (get_row_layout() == 'facts_module'):
                $clientName = get_sub_field('client_block_name') ? '<div class="client__name">' . get_sub_field('client_block_name') . '</div>' : '';
                $companyName = get_sub_field('company_block_name'); ?>
                <div class="latest-cases__links_wrapper">
                    <a class="latest-cases__link indent-none" href="<?php the_permalink($query->post->ID); ?>">
                        <?php echo $clientName; ?>
                    </a>
                    <a class="latest-cases__link link-arrow" href="<?php the_permalink($query->post->ID); ?>">

                        <?php echo '<div class="latest-cases__link_title">' . $companyName . '</div>'; ?>

                        <?php get_template_part_var('templates/parts/arrow'); ?>
                    </a>
                </div>
            <?php
            endif;
        endwhile;
    endif; ?>
</div>