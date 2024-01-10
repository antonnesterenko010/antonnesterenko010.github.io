<?php

$type = get_sub_field('video');
$videoUpload = get_sub_field('upload_video');
$offsetTop = get_sub_field('offset_top');
$autoplay = get_sub_field('autoplay');
$fullScreen = get_sub_field('video_fullscreen');
$src = $type === 'video23' ? get_sub_field('video23') . '&hideBigPlay=1' : $videoUpload['url'];
if ($type == 'vimeo') {
    $src = get_sub_field('vimeo');
}
$addCustom = get_sub_field('add_custom_section_bg');
$bgAdd = styleControl();

?>

<section class="video__module  <?php echo $offsetTop ? 'offset-top' : '' ?> <?php echo $addCustom ? 'custom-mobile-pudding' : '' ?>" <?php echo $bgAdd?>>
    <div class="container-fluid max-width relative">
        <div class="video__wrapper">
            <?php get_template_part_var('templates/parts/video', compact('src', 'autoplay', 'type', 'fullScreen')) ?>
        </div>
    </div>
</section>


