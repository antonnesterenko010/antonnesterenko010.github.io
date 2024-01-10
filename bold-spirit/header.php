<?php

use ThemeOptions\Helpers;

$fields = get_fields('options');

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/dest/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() ?>/dest/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() ?>/dest/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri() ?>/dest/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri() ?>/dest/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/<?php echo get_template_directory_uri() ?>dest/images/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="<?php echo get_template_directory_uri() ?>/dest/images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open();

?>
<div class="site-body">
    <div class="popup-download">
        <div class="popup-download__container">
            <h2>
                <?php echo Helpers::get($fields,'download_pop_up.title') ?>
            </h2>
            <h3>
                <?php echo Helpers::get($fields,'download_pop_up.sub_title') ?>
            </h3>
            <p>
                <?php echo Helpers::get($fields,'download_pop_up.description') ?>
            </p>
            <a id="popup_pdf" style="visibility: hidden;"  download="8 Essential Strategies for Captivating Your Target Market">hidden</a>
            <a target="_blank" href="<?php echo Helpers::get($fields,'download_pop_up.pdf_file') ?>"  class="popup-download__btn">  <?php echo Helpers::get($fields,'download_pop_up.btn_title') ?>
                <span class="popup-download__btn__bg"></span>
                <span class="popup-download__btn__text"> <?php echo Helpers::get($fields,'download_pop_up.btn_title') ?></span>
            </a>
        </div>
    </div>
<header class="header">

    <?php if(Helpers::get($fields, 'header.logo')) : ?>
    <a href="<?php echo home_url();?>" class="logo">
        <img width="322px" height="36px" src="<?php echo Helpers::get($fields, 'header.logo')?>" alt="logo">
    </a>
    <?php endif;?>
</header>
