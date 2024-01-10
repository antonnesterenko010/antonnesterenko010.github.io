<?php

$additionFormat = get_field('additional_picture_format', $query->post->ID);
$additionFormatWebp = get_field('additional_picture_format_webp', $query->post->ID);
$casesImgWebp = get_field('thumbnail_webp', $query->post->ID);
$additionHoverFormat = get_field('additional_picture_format_for_hover_image', $query->post->ID);

if (!isset($first)) {
    $first = false;
}

if (isset($first) && $first) {
    $image = get_the_post_thumbnail($query->post->ID, $imgSize, ['loading' => false]);
    $imageWeb = $casesImgWebp ? $casesImgWebp['sizes'][$imgSize] : '' ;
    $imgTMP = true;
} else if ($additionFormat) {
    $image = $additionFormat ? $additionFormat['sizes'][$addSize] : '' ;
    $imageWeb = $additionFormatWebp ? $additionFormatWebp['sizes'][$addSize] : '' ;
    $imgTMP = false;
} else {
    $image = get_the_post_thumbnail($query->post->ID, $imgSize, ['loading' => false]);
    $imageWeb = $casesImgWebp ? $casesImgWebp['sizes'][$imgSize] : '' ;
    $imgTMP = true;
}

$casesLinkText = get_field('cases_text_link', $query->post->ID);

if (isset($additionHoverFormat) && $additionHoverFormat && !$first) {
    $imageHover = $additionHoverFormat;
    $imgSize = $addSize;
}else {
    $imageHover = get_field('hover_image',$query->post->ID);
}

?>
<div class="latest-cases__item">
    <div class="latest-cases__img-wrapper redesign">
        <a href="<?php echo get_permalink($query->post->ID) ?>">
            <?php
            get_template_part_var('templates/parts/picture', ['imageWeb' => $imageWeb, 'image'=>$image, 'thumbnail' => $imgTMP]); ?>
            <div class="img-absolute" <?php echo $imageHover ? 'style="background-image:url(' . $imageHover['sizes'][$imgSize] . ')"' : ''; ?>></div>
        </a>
    </div>
    <div class="latest-cases__title-wrapper">
        <h3 class="latest-cases__title msq-body">
            <?php
            if (have_rows('content', $query->post->ID)):
            while (have_rows('content', $query->post->ID)):
            the_row();
            if (get_row_layout() == 'facts_module'):
                $clientName = get_sub_field('client_block_name', $query->post->ID);
                echo $clientName;
            endif;
            endwhile;
            endif;
             ?>
        </h3>
        <a class="latest-cases__link link-arrow msq-body" href="<?php the_permalink($query->post->ID); ?>">
            <?php echo get_the_title($query->post->ID) ?>
            <?php get_template_part_var('templates/parts/redesign-arrow'); ?>
        </a>
    </div>
</div>