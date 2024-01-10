<?php
$textColor = get_sub_field('text_color');
$title = get_sub_field('title');
$desc = get_sub_field('desc');
$type = get_sub_field('videotype');
$blockAlign = get_sub_field('block_align');
$blockType = get_sub_field('block_type');
$bgColor = get_sub_field('background_color');
$shadow = get_sub_field('shadow');
$addCustom = get_sub_field('add_custom_section_bg');
$bgAdd = styleControl();
$fullScreen = get_sub_field('video_fullscreen');
?>

<section class="text-mobile-video__module <?php echo $addCustom ? 'custom-mobile-pudding' : '' ?>" <?php echo $bgAdd?>>
    <div class="container-fluid max-width">
        <div class="text-mobile-video__wrapper <?php echo $textColor == 1 ? 'white' : '' ?>">
            <div class="text-mobile-video__video-wrapper">
                <?php
                $autoplay = get_sub_field('autoplay');
                $src = $type === 'video23' ? get_sub_field('video_23') . '&hideBigPlay=1' : (get_sub_field('video_upload') ? get_sub_field('video_upload')['url'] : '');
                if ($type == 'vimeo') {
                    $src = get_sub_field('vimeo');
                }
                ?>
                <div class="text-mobile-video__video-item" <?php echo $bgColor ? 'style="background-color:' . $bgColor . '"' : '' ?>>
                    <?php if ($blockType === 'img') : ?>
                        <?php
                        $image = get_sub_field('image') ? get_sub_field('image')['url'] : '';
                        $imageWeb = get_sub_field('image_webp') ? get_sub_field('image_webp')['url'] : '';
                        ?>
                        <div class="text-and-image-video__image-item  <?php echo $shadow ? 'block-shadow-mobile' : '' ?>">
                            <?php get_template_part_var('templates/parts/picture', ['imageWeb' => $imageWeb, 'image' => $image]); ?>
                        </div>
                    <?php else : ?>
                        <div class="text-and-image-video__video-item-wrapper  <?php echo $shadow ? 'block-shadow-mobile' : '' ?>">
                            <?php get_template_part_var('templates/parts/video', compact('src', 'autoplay', 'type', 'fullScreen')) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="editor-cont text-mobile-video__info-wrapper <?php echo $blockAlign === 'right' ? 'order-1' : '' ?>">
                <p class="text-mobile-video__title"><?php echo $title ? $title : '' ?></p>
                <?php echo $desc ? $desc : '' ?>
            </div>
        </div>
    </div>
</section>

