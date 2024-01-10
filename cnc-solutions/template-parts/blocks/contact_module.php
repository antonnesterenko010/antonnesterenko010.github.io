<?php

use ThemeOptions\Helpers;
use inc\CustomFunctions;

$acfFieldKeys = [
    'content'
];

$subFields = CustomFunctions::getSubFields($acfFieldKeys);

?>
<section class="contact" id="contact-section">
    <div class="contact-form">
        <?php if (Helpers::get($subFields, 'content.form_title')) : ?>
            <h2 class="contact-form__title"><?php echo Helpers::get($subFields, 'content.form_title')?></h2>
        <?php endif;?>
        <?php
        if(Helpers::get($subFields, 'content.form_shortcode')) :
            echo do_shortcode(Helpers::get($subFields, 'content.form_shortcode'));
        endif;
        ?>
    </div>
    <div class="contact-info">
        <?php if (Helpers::get($subFields, 'content.info_top_title') || Helpers::get($subFields, 'content.info_top_subtitle')) : ?>
        <div class="contact-info__block contact-info__top">
            <h3><?php echo Helpers::get($subFields, 'content.info_top_title')?></h3>
            <?php echo Helpers::get($subFields, 'content.info_top_subtitle')?>
        </div>
        <?php endif;
        if (Helpers::get($subFields, 'content.info_bottom_title') || Helpers::get($subFields, 'content.info_bottom_subtitle')) : ?>
        <div class="contact-info__block contact-info__bottom">
            <h3><?php echo Helpers::get($subFields, 'content.info_bottom_title')?></h3>
            <?php echo Helpers::get($subFields, 'content.info_bottom_subtitle')?>
        </div>
        <?php endif;?>
    </div>
</section>