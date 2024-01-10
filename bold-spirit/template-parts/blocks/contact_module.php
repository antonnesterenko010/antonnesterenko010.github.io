<?php

use ThemeOptions\Helpers;
use inc\CustomFunctions;

$acfFieldKeys = [
    'content'
];

$subFields = CustomFunctions::getSubFields($acfFieldKeys);

?>

<section class="contact">
    <div class="decor-line__top">
        <img width="107px" height="107px" src="<?php echo get_template_directory_uri() . '/dest/images/logo_circle.svg' ?>" alt="logo_circle">
    </div>
    <span class="decor-bottom"></span>
    <div class="container">
        <div class="contact-block">
            <div class="owner-block">
                <?php if (Helpers::get($subFields, 'content.owner_title')) : ?>
                    <h3 class="owner-title">
                        <?php echo Helpers::get($subFields, 'content.owner_title') ?>
                    </h3>
                <?php endif;
                if (Helpers::get($subFields, 'content.owner_subtitle')) :
                    ?>
                    <div class="owner-subtitle">
                        <?php echo Helpers::get($subFields, 'content.owner_subtitle') ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-block">
                <div class="form-block__window">
                    <?php if (Helpers::get($subFields, 'content.pdf_form_title')) : ?>
                        <h2 class="form-title"><?php echo Helpers::get($subFields, 'content.pdf_form_title') ?>
                        </h2>
                    <?php endif; ?>
                    <div class="form-divider"></div>
                    <?php if (Helpers::get($subFields, 'content.pdf_form_subtitle')) : ?>
                        <p class="form-subtitle"><?php echo Helpers::get($subFields, 'content.pdf_form_subtitle') ?></p>
                    <?php endif;

                    if (Helpers::get($subFields, 'content.pdf_form_shortcode')) :
                    echo do_shortcode(Helpers::get($subFields, 'content.pdf_form_shortcode'));
                    endif;
                    if (Helpers::get($subFields, 'content.pdf_form_tablet_image')) :
                        ?>
                        <div class="form-block__tablet">
                            <img  width="243px" height="355px" src="<?php echo Helpers::get($subFields, 'content.pdf_form_tablet_image') ?>"
                                 alt="tablet-image">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <button class="scroll-to-top">
            <span>Top</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8" fill="none">
                <path d="M1.70711 7.70711C1.31658 8.09763 0.683417 8.09763 0.292893 7.70711C-0.0976311 7.31658 -0.0976311 6.68342 0.292893 6.29289L6.29289 0.292893C6.68342 -0.0976315 7.31658 -0.0976315 7.70711 0.292893L13.7071 6.29289C14.0976 6.68342 14.0976 7.31658 13.7071 7.70711C13.3166 8.09763 12.6834 8.09763 12.2929 7.70711L7 2.41421L1.70711 7.70711Z"
                      fill="url(#paint0_linear_31_4767)"/>
                <defs>
                    <linearGradient id="paint0_linear_31_4767" x1="-2.8026" y1="7.86721" x2="3.75048" y2="-2.13002"
                                    gradientUnits="userSpaceOnUse">
                        <stop stop-color="#947532"/>
                        <stop offset="0.413771" stop-color="#B4A052"/>
                        <stop offset="0.552083" stop-color="#FFF2BA"/>
                        <stop offset="0.729167" stop-color="#EBDD8B"/>
                        <stop offset="1" stop-color="#9C7534"/>
                    </linearGradient>
                </defs>
            </svg>
        </button>
    </div>
</section>
