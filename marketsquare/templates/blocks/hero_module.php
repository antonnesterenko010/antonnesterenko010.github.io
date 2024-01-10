<?php
$heroTitle = get_sub_field('title');
$subTitle = get_sub_field('sub_title');
$showText = get_sub_field('show_text');
$changeHeight = get_sub_field('change_module_height');
$addHighlightedWord = get_sub_field('add_highlighted_word');
$backgroundType = get_sub_field('background_type');
$backgroundColor = get_sub_field('background_color');
$hideDescMob = get_sub_field('hide_description_on_mobile');
$backgroundImg = get_sub_field('background_img');
$uploadVideo = get_sub_field('upload_video');
$frameSrc = $backgroundType === 'video23' ? get_sub_field('video23') . '&ambient=1&hideBigPlay=1' : '';
if ($backgroundType === 'vimeo') {
    $frameSrc = get_sub_field('vimeo');
}
global $post;
$postDesc = get_field('short_description', $post->ID) ? get_field('short_description', $post->ID) : (get_field('additional_content', $post->ID) ? get_field('additional_content',
    $post->ID)['short_desc'] : '');
if ($postDesc) {
    $description = $postDesc;
} else {
    $description = get_sub_field('description');
}
$imgMaxWidth = get_sub_field('max_width') ? 'style="max-width:' . get_sub_field('max_width') . 'px"' : '';
$subType = get_sub_field('sub_title_type');
$subTitleLink = get_sub_field('sub_title_link');

?>


<section
        class="hero_module <?php echo $backgroundType === 'video' || $backgroundType === 'video23' || $backgroundType === 'vimeo' ? 'video-hero' : '' ?>" <?php if ($backgroundType === 'imgcolor' && $backgroundColor) {
    echo 'style="background:' . $backgroundColor['back_color'] . '"';
} else if ($backgroundType === 'image' && $backgroundImg) {
    echo 'style="background:no-repeat center url(' . $backgroundImg['url'] . ')"';
} ?>>
    <?php if ($backgroundType === 'video' || $backgroundType === 'video23' || $backgroundType === 'vimeo') : ?>
        <?php if ($backgroundType === 'video') : ?>
            <video class="video__wrapper" playsinline autoplay loop muted width="100%" height="100%">
                <source src="<?php echo $uploadVideo ?>">
            </video>
        <?php elseif ($backgroundType === 'vimeo') :
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
    <div class="container-fluid max-width">
        <div class="hero" style="
                padding-top: <?php echo !empty($changeHeight['padding_top']) ? $changeHeight['padding_top'] . 'px' : ''; ?>;
                padding-bottom: <?php echo !empty($changeHeight['padding_bottom']) ? $changeHeight['padding_bottom'] . 'px' : ''; ?>;
                min-height: <?php echo !empty($changeHeight['min_height']) ? $changeHeight['min_height'] . 'px' : ''; ?>">
            <div class="hero__title-wrapper" style="
                    max-width: <?php echo !empty($changeHeight['max_width']) ? $changeHeight['max_width'] . 'px' : ''; ?>">
                <?php if ($subTitle) :?>
                <div class="hero__subtitle-wrapper <?php echo $showText || $postDesc ? 'order-3' : ''; ?>">
                    <?php
                    switch ($subType) {
                        case 'link' :
                            ?>
                            <a href='<?php echo $subTitleLink ? $subTitleLink : '' ?>' class="mainBtnSmall"
                               style="<?php echo 'margin-right:' . get_sub_field('sub_title_margin_right') . 'px' ?>"><?php echo $subTitle ? $subTitle : '' ?></a>
                            <?php break;
                        case 'orangelink' : ?>
                            <a href='<?php echo $subTitleLink ? $subTitleLink : '' ?>' class="mainBtnSmallOrange"
                               style="<?php echo 'margin-right:' . get_sub_field('sub_title_margin_right') . 'px' ?>"><?php echo $subTitle ? $subTitle : '' ?></a>
                            <?php break;
                        default : ?>
                            <h4 class="hero__subtitle"
                                style="color: <?php echo get_sub_field('title_font_color') . '; margin-right:' . get_sub_field('sub_title_margin_right') . 'px' ?>"><?php echo $subTitle ? $subTitle : '' ?></h4>
                        <?php
                    }
                    ?>
                    <?php if ($showText || $postDesc) : ?>
                        <p class="hero__desc <?php echo $hideDescMob ? 'hide' : ''; ?>"
                           style="color: <?php echo get_sub_field('subtitle_font_color') ?>"><?php echo $description ? $description : '' ?></p>
                    <?php endif; ?>
                </div>
                <?php endif;?>
                <div class="hero__title-wrapper">
                    <h1 class="hero__title" style="color: <?php echo get_sub_field('desc_font_color') ?>"><?php echo $heroTitle ? $heroTitle : '' ?></h1>
                </div>
                <?php if ($addHighlightedWord) : ?>
                    <div class="hero__highlighted-wrapper">
                        <div id="hero__highlighted"></div>
                    </div>
                <?php endif; ?>
            </div>
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
    </div>
</section>
