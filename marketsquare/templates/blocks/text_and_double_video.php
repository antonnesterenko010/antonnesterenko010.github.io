<?php
$textColor = get_sub_field('text_color');
$blockTitle = get_sub_field('block_title');
$blockDesc = get_sub_field('block_desc');
$type = get_sub_field('video_type');
$videoBlock = get_sub_field('video_block');
$blockType = get_sub_field('block_type');
$imageBlock = get_sub_field('image_block');
$bgColor = get_sub_field('background_color');
$blockAlign = get_sub_field('mobile_block_position');
$shadow = get_sub_field('shadow');
$addCustom = get_sub_field('add_custom_section_bg');
$bgAdd = styleControl();
$fullScreen = get_sub_field('video_fullscreen');
?>

<section class="text-double-video__module <?php echo $addCustom ? 'custom-mobile-pudding' : '' ?>" <?php echo $bgAdd?>>
    <div class="container-fluid max-width">
        <div class="text-double-video__wrapper <?php echo $textColor == 1 ? 'white' : '' ?>">
            <div class="text-double-video__video-wrapper">
                <?php
                if ($blockType === 'img') :
                    foreach ($imageBlock as $itemImage) :
                        $image = $itemImage['image'] ? $itemImage['image']['url'] : '';
                        $imageWeb = $itemImage['image_webp'] ? $itemImage['image_webp']['url'] : '';
                        ?>
                        <div class="text-double-video__video-item" <?php echo $bgColor ? 'style="background-color:' . $bgColor . '"' : '' ?>>
                            <div class="text-and-image-video__image-item  <?php echo $shadow ? 'block-shadow-mobile' : '' ?>">
                                <?php get_template_part_var('templates/parts/picture', ['imageWeb' => $imageWeb, 'image' => $image]); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php foreach ($videoBlock as $item) :
                        $autoplay = get_sub_field('autoplay');
                        $src = $type === 'url23' ? $item['video'] . '&hideBigPlay=1' : $item['video_upload']['url'];
                        if ($type == 'vimeo') {
                            $src = get_sub_field('vimeo');
                        }
                        ?>
                        <div class="text-double-video__video-item" <?php echo $bgColor ? 'style="background-color:' . $bgColor . '"' : '' ?>>
                            <div class="text-and-image-video__video-item-wrapper  <?php echo $shadow ? 'block-shadow-mobile' : '' ?>">
                                <?php get_template_part_var('templates/parts/video', compact('src', 'autoplay', 'type', 'fullScreen')) ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
            <div class="text-double-video__info-wrapper <?php echo $blockAlign === 'right' ? 'order-1' : '' ?>">
                <p class="text-double-video__title"><?php echo $blockTitle ? $blockTitle : '' ?></p>
                <div class="text-double-video__desc editor-cont">
                    <?php echo $blockDesc ? $blockDesc : '' ?>
                </div>
            </div>
        </div>
    </div>
</section>
