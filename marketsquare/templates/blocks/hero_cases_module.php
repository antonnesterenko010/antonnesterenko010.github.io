<?php
$heroType = get_sub_field('hero_type');
$heroImg = get_sub_field('image');
$videoType = get_sub_field('video_type');
$heroImgWebp = get_sub_field('image_webp');
$image = $heroImg ? $heroImg['sizes']['hero-cases-img'] : '';
$imageWeb = $heroImgWebp ? $heroImgWebp['sizes']['hero-cases-img'] : '';
$uploadVideo = get_sub_field('hero_video_upload') ? get_sub_field('hero_video_upload')['url'] : '';


$frameSrc = $heroType === 'video' && $videoType === 'url23' ? get_sub_field('hero_video') . '&ambient=1&hideBigPlay=1' : '';
if ($heroType === 'video' && $videoType === 'vimeo') {
    $frameSrc = get_sub_field('hero_vimeo');
}
$imgHeightFull = get_sub_field('img_full_height');
?>


<section class="hero-cases__module <?php echo $imgHeightFull ? 'img-full-height' : '' ?> <?php echo $heroType === 'video' ? 'video-hero' : '' ?>">
    <?php if ($heroType === 'video') : ?>
        <?php if ($videoType === 'upload') : ?>
            <video class="video__wrapper" playsinline autoplay loop muted width="100%" height="100%">
                <source src="<?php echo $uploadVideo ?>">
            </video>
        <?php elseif ($videoType === 'vimeo') :
            $pattern = '/\d+/';

            if (preg_match($pattern, $frameSrc, $matches)) :
                $id = $matches[0];

                $source = 'https://player.vimeo.com/video/' . $id . '?autoplay=1&muted=1'; ?>
                <iframe src="<?php echo $source; ?>" data-src="<?php echo $source; ?>" width="640" height="360" frameborder="0"
                        allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
            <?php endif;
        else : ?>
            <iframe class="hero-frame" src="<?php echo $frameSrc ?>"></iframe>
        <?php endif; ?>
    <?php endif; ?>
    <?php if ($heroType === 'image'): ?>
        <div class="hero-cases__wrapper">
            <?php if($heroImgWebp):?>
                <img src="<?php echo wp_get_attachment_image_url($heroImgWebp['ID'], 'full') . '?original'; ?>" alt="">
            <?php else:?>
                <img src="<?php echo wp_get_attachment_image_url($heroImg['ID'], 'full') . '?original'; ?>" alt="">
            <?php endif;?>
        </div>
    <?php endif; ?>
</section>

