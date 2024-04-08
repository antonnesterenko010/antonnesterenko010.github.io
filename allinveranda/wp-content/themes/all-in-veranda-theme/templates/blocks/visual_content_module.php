<?php
$image = get_sub_field('image');
$content = get_sub_field('content');

$reversed = get_sub_field('reversed');
$alignment = get_sub_field('alignment');
$backgroundColor = get_sub_field('section_background');
?>
<section class="visual<?php if ($reversed === true) : ?> reversed<?php endif; if ($alignment === 'center') : ?> align-center<?php endif; if($alignment === 'end') : ?> align-end<?php endif;if (!$image): ?> full-width<?php endif;?>" <?php if ($backgroundColor) : ?> style="background: <?php echo $backgroundColor; endif;?>">
    <div class="container">
        <?php if ($image) : ?>
        <a class="visual__image" data-fancybox="gallery" data-src="<?php echo $image['url']?>" data-caption="<?php echo $image['alt']?>">
            <img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>">
        </a>
        <?php endif;?>
        <div class="visual__content">
            <?php if ($content) : ?>
            <div class="visual__title">
                <?php echo $content ?>
            </div>
            <?php endif;?>
        </div>
    </div>
</section>