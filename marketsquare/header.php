<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo get_bloginfo('description', 'display'); ?>">
    <?php global $sitepress;
    $curLang = $sitepress->get_current_language();
    $getAltId = apply_filters('wpml_object_id', get_the_ID(), get_post_type(), false, $curLang == 'da' ? 'en' : 'da');
    $linkDiffLang = apply_filters('wpml_permalink', get_the_permalink(), $curLang == 'da' ? 'en' : 'da'); ?>
    <link rel="canonical" hreflang="<?php echo $curLang; ?>" href="<?php echo get_the_permalink(); ?>"/>
    <?php if ($getAltId && get_post_status($getAltId) == 'publish'): ?>
        <link rel="alternate" hreflang="<?php echo $curLang == 'da' ? 'en' : 'da'; ?>"
              href="<?php echo $linkDiffLang; ?>"/>
    <?php endif; ?>

    <?php if ($curLang === 'en') {
        echo '<script id="CookieConsent" src="https://policy.app.cookieinformation.com/uc.js"
    data-culture="EN" type="text/javascript"></script>';
    }
    if ($curLang === 'da') {
        echo '<script id="CookieConsent" src="https://policy.app.cookieinformation.com/uc.js"
    data-culture="DA" type="text/javascript"></script>';
    } ?>

    <?php wp_head(); ?>
</head>
<?php $background = get_post_meta(get_the_ID(), 'body_background_color', true) ?>
<?php $bgMenu = get_post_meta(get_the_ID(), 'white_bg_on_menu', true) ?>
<?php $changeCursorColor = get_post_meta(get_the_ID(), 'change_cursor_color', true) ?>
<?php $menuFontWhite = get_post_meta(get_the_ID(), 'reverse_bg_on_menu', true) ?>
<?php $bgMenuWhite = get_post_meta(get_the_ID(), 'dark-bg', true) ?>
<?php $cursor = $changeCursorColor ? 'cursor-none' : ''; ?>
<body <?php body_class($cursor); ?> <?php echo $background ? 'style="background-color:' . $background . '"' : '' ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <?php $logo = $menuFontWhite ? get_field('logo', 'option') : get_field('logo', 'option') ?>
    <div class="sticky-btn-wrapper container-fluid max-width menu-toggle-btn">
        <a class="header__logo-mobile-top header__logo-mobile" href="<?php echo home_url() ?>">
            <img src="<?php echo $logo['url'] ? $logo['url'] : '' ?>"
                 alt="<?php echo $logo['alt'] ? $logo['alt'] : '' ?>">
        </a>
        <div class="sticky-btn">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 5.9998C0 5.33706 0.537258 4.7998 1.2 4.7998H10.8C11.4627 4.7998 12 5.33706 12 5.9998C12 6.66255 11.4627 7.1998 10.8 7.1998H1.2C0.537259 7.1998 0 6.66255 0 5.9998Z"
                      fill="#0C1210"/>
                <path d="M0 11.9998C0 11.3371 0.537258 10.7998 1.2 10.7998H22.8C23.4627 10.7998 24 11.3371 24 11.9998C24 12.6625 23.4627 13.1998 22.8 13.1998H1.2C0.537258 13.1998 0 12.6625 0 11.9998Z"
                      fill="#0C1210"/>
                <path d="M0 17.9998C0 17.3371 0.537258 16.7998 1.2 16.7998H10.8C11.4627 16.7998 12 17.3371 12 17.9998C12 18.6625 11.4627 19.1998 10.8 19.1998H1.2C0.537259 19.1998 0 18.6625 0 17.9998Z"
                      fill="#0C1210"/>
            </svg>
        </div>
    </div>
    <div class="sticky-arrow-wrapper container-fluid max-width">
        <span class="sticky-arrow">
        </span>
    </div>
    <!--    <div class="cursor-block"></div>-->
    <header id="masthead"
            class="site-header <?php echo $bgMenuWhite ? 'background-menu-reverse' : '' ?> <?php echo $menuFontWhite ? 'white-font' : '' ?> <?php echo $bgMenu ? 'background-menu' : '' ?>">
        <div class="container-fluid header__container">
            <div class="header__wrapper">
                <div class="header__logo">
                    <a href="<?php echo home_url() ?>">
                        <img src="<?php echo $logo['url'] ? $logo['url'] : '' ?>"
                             alt="<?php echo $logo['alt'] ? $logo['alt'] : '' ?>">
                    </a>
                </div>
                <div class="header__logo-mobile">
                    <?php $logo = get_field('logo_white', 'option') ?>
                    <a href="<?php echo home_url() ?>">
                        <?php $logo = $menuFontWhite ? get_field('logo_white', 'option') : get_field('logo_white', 'option') ?>
                        <img src="<?php echo $logo['url'] ? $logo['url'] : '' ?>"
                             alt="<?php echo $logo['alt'] ? $logo['alt'] : '' ?>">
                    </a>
                </div>
                <?php
                headerMenuLeft();
                headerMenuRight();
                headerMenuLocale();
                ?>

                <div class="header__social">
                    <?php $headerSocial = get_field('header_social', 'option');
                    $headerBottomEmail = get_field('header_mobile_bottom_email', 'option');
                    if ($headerSocial) :
                        ?>
                        <div class="header__social-wrapper">
                            <?php foreach ($headerSocial as $social) : ?>
                                <a href="<?php echo $social['social_link'] ?>"><?php echo $social['social_item'] ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif;
                    if ($headerBottomEmail) :
                        ?>
                        <div class="header__contact-wrapper">
                            <a href="mailto:<?php echo $headerBottomEmail ?>"><?php echo $headerBottomEmail ?></a>
                        </div>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </header>

