<?php
$title = get_sub_field('module_title');
$subtitle = get_sub_field('module_subtitle');
$text = get_sub_field('text');
$image = get_sub_field('image');
$form = get_sub_field('contact_form');

$paddingTop = get_sub_field('padding_top');
$paddingBottom = get_sub_field('padding_bottom');
$paddingTopMobile = get_sub_field('padding_top_mobile');
$paddingBottomMobile = get_sub_field('padding_bottom_mobile');
?>

<section class="contact-module" style="--padding-top:<?php echo $paddingTop; ?>px;--padding-bottom:<?php echo $paddingBottom; ?>px;--padding-top-mobile:<?php echo $paddingTopMobile; ?>px;--padding-bottom-mobile:<?php echo $paddingBottomMobile; ?>px;">
    <div class="container-fluid max-width">
        <?php if($subtitle) : ?>
            <p class="msq-body contact__subtitle "><?php echo $subtitle ?></p>
        <?php endif;?>
        <div class="contact__wrapper">
            <div class="contact__image-wrapper">
                <?php echo wp_get_attachment_image($image, 'full'); ?>
            </div>
            <div class="contact__form-wrapper">
                <h2><?php echo $title; ?></h2>
                <p><?php echo $text; ?></p>
                <?php echo do_shortcode('[wpforms id=' . $form[0]->ID . ']'); ?>
            </div>
        </div>
    </div>
</section>
