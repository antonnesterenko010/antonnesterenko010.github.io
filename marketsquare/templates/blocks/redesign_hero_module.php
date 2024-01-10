<?php
$heroTitle = get_sub_field('title');
$heroSubtitle = get_sub_field('subtitle');
$changeHeight = get_sub_field('change_module_height');
$backgroundType = get_sub_field('background_type');
$backgroundColor = get_sub_field('background_color');
$backgroundImg = get_sub_field('background_img');
$uploadVideo = get_sub_field('upload_video');
$uploadVideoMobile = get_sub_field('upload_video_mobile');
$frameSrc = $backgroundType === 'video23' ? get_sub_field('video23') . '&ambient=1&hideBigPlay=1' : '';
if ($backgroundType === 'vimeo') {
    $frameSrc = get_sub_field('vimeo');
}

$imgMaxWidth = get_sub_field('max_width') ? 'style="max-width:' . get_sub_field('max_width') . 'px"' : '';


?>


<section
    class="redesign-hero" style="
        padding-top: <?php echo !empty($changeHeight['padding_top']) ? $changeHeight['padding_top'] . 'px' : ''; ?>;
        padding-bottom: <?php echo !empty($changeHeight['padding_bottom']) ? $changeHeight['padding_bottom'] . 'px' : ''; ?>;
        ">

    <div class="container-fluid max-width">
        <div class="hero__content-wrapper <?php echo $backgroundType === 'video' || $backgroundType === 'video23' || $backgroundType === 'vimeo' ? 'video-hero' : '' ?>"
            style="--video-height-diff:  <?php echo !empty($changeHeight['min_height']) ? $changeHeight['min_height'] . 'px;' : ''; ?>
            <?php if ($backgroundType === 'imgcolor' && $backgroundColor) {
                echo 'background:' . $backgroundColor['back_color'] . ';';
            } else if ($backgroundType === 'image' && $backgroundImg) {
                echo 'background:no-repeat center url(' . $backgroundImg['url'] . ');';
            } ?>">

            <?php if ($backgroundType === 'video' || $backgroundType === 'video23' || $backgroundType === 'vimeo') : ?>
                <?php if ($backgroundType === 'video') : ?>
                    <video class="video__wrapper <?php if($uploadVideoMobile) { echo 'desktop'; }?>" playsinline autoplay loop muted width="100%" height="100%">
                        <source src="<?php echo $uploadVideo ?>">
                    </video>
                <?php if($uploadVideoMobile) :?>
                    <video class="video__wrapper mobile" playsinline autoplay loop muted width="100%" height="100%">
                        <source src="<?php echo $uploadVideoMobile ?>">
                    </video>
                    <?php endif;?>
                <?php elseif ($backgroundType === 'vimeo') : ?>
                    <?php
                    $pattern = '/\d+/';

                    if (preg_match($pattern, $frameSrc, $matches)) :
                        $id = $matches[0];

                        $source = 'https://player.vimeo.com/video/' . $id . '?autoplay=1&muted=1'; ?>
                        <iframe src="<?php echo $source; ?>" data-src="<?php echo $source; ?>" width="640" height="360" frameborder="0"
                                allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                    <?php endif; ?>
                <?php else : ?>
                    <iframe class="hero-frame" src="<?php echo $frameSrc ?>"></iframe>
                <?php endif; ?>
            <?php endif; ?>

            <?php if ($backgroundType === 'imgcolor' && $backgroundColor['image']) : ?>
                <?php
                $imageWeb = $backgroundColor['image_webp'] ? $backgroundColor['image_webp']['sizes']['mainhero'] : '';
                $image = $backgroundColor['image'] ? $backgroundColor['image']['sizes']['mainhero'] : '';
                ?>
                <div class="hero__img-wrapper" <?php echo $imgMaxWidth ? $imgMaxWidth : '' ?>>
                    <?php get_template_part_var('templates/parts/picture', ['imageWeb' => $imageWeb, 'image' => $image]); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="hero__title-wrapper">
            <?php if($heroTitle) : ?>
            <h1 class="redesign-hero__title" style="color: <?php echo get_sub_field('title_font_color') ?>"><?php echo $heroTitle ?></h1>
            <?php endif;
            if ($heroSubtitle) :
            ?>
            <h3 class="redesign-hero__subtitle" style="color: <?php echo get_sub_field('subtitle_font_color') ?>"><?php echo $heroSubtitle ?></h3>
            <?php endif;?>
        </div>
    </div>

</section>
