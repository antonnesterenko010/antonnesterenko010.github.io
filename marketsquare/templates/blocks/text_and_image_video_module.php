<?php
$textColor = get_sub_field('text_color');
$imageSize = get_sub_field('image_size');
$blockTitle = get_sub_field('block_title');
$blockDesc = get_sub_field('block_desc');
$type = get_sub_field('right_block_type');
$mainImage = get_sub_field('image');
$mainImageWebp = get_sub_field('image_webp');
$video23 = get_sub_field('video23');
$itemSwap = get_sub_field('items_swap');
$videoUpload = get_sub_field('video_upload');
$autoplay = get_sub_field('autoplay');
$fullScreen = get_sub_field('video_fullscreen');

$image = $mainImage ? $mainImage['url'] : '';
$imageWeb = $mainImageWebp ? $mainImageWebp['url'] : '';

if ($type !== 'image') {
    $src = $type === 'url23' ? get_sub_field('video23') . '&hideBigPlay=1' : $videoUpload['url'];
    if ($type == 'vimeo') {
        $src = get_sub_field('vimeo');
    }
}
$addCustom = get_sub_field('add_custom_section_bg');
$bgAdd = styleControl();

$textAling = get_sub_field('text_align');
$textStyle = 'style="justify-content:'. $textAling .'"';
?>

<section class="text-and-image-video__module <?php echo $addCustom ? 'custom-mobile-pudding' : '' ?>" <?php echo $bgAdd?>>
    <div class="container-fluid max-width">
        <div class="text-and-image-video__content-wrapper <?php echo $imageSize ? 'half' : ''?> <?php echo $itemSwap ? 'reverse' : '' ?> <?php echo $textColor == 1 ? 'white' : '' ?>">
            <div class="text-and-image-video__info" <?php echo $textStyle ?>>
                <h3 class="text-and-image-video__title"><?php echo $blockTitle ? $blockTitle : '' ?></h3>
                <p class="text-and-image-video__desc"><?php echo $blockDesc ? $blockDesc : '' ?></p>
            </div>
            <div class="text-and-image-video__right-block <?php echo $type === 'upload' ? 'upload-video' : '' ?> <?php echo $type !== 'image' ? 'video-right-block' : '' ?>">
                <?php if ($type === 'image'): ?>
                    <?php get_template_part_var('templates/parts/picture', ['imageWeb' => $imageWeb, 'image' => $image]); ?>
                <?php else : ?>
                    <?php get_template_part_var('templates/parts/video', compact('src', 'autoplay', 'type', 'fullScreen')) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
