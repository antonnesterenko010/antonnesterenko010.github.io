<?php
$type = get_sub_field('video_type');
$videoUpload = get_sub_field('video_upload');
$boxShadow = get_sub_field('box_shadow');
$backgroundColor = get_sub_field('background_color');
$autoplay = get_sub_field('autoplay');
$src = $type === 'url23' ? get_sub_field('video_23') . '&hideBigPlay=1' : $videoUpload['url'];
if ($type == 'vimeo') {
    $src = get_sub_field('vimeo');
}
$backgroundColor = $backgroundColor ? 'background-color:' . $backgroundColor . ';' : '';
$padding = 'padding:' . get_sub_field('padding');;
$style = 'style="' . $backgroundColor . $padding . '"';
$addCustom = get_sub_field('add_custom_section_bg');
$bgAdd = styleControl();
$fullScreen = get_sub_field('video_fullscreen');
?>

<section class="video-cases__module <?php echo $addCustom ? 'custom-mobile-pudding' : '' ?>" <?php echo $bgAdd?>>
    <div class="container-fluid max-width">
        <div class="video-cases__wrapper" <?php echo $style ?>>
            <div class="video-cases__shadow-wrapper <?php echo $boxShadow ? 'box-shadow' : '' ?>">
                <?php get_template_part_var('templates/parts/video', compact('src', 'autoplay', 'type', 'fullScreen')) ?>
            </div>
        </div>
    </div>
</section>
