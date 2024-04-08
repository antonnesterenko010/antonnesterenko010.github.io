<?php
$fields = get_fields('options');
$header = $fields['header'];
$global = $fields['global'];

$headerLogo = $header['logo'];
$additionalStyle = $header['additional_style'];
$additionalScripts = $header['additional_scripts'];
$headerButton = $header['button'];

$enableGlobalLogo = $global['global_logo'];
$globalLogo = $global['logo'];

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head();
    if ($additionalStyle) :
        echo '<style>';
        echo $additionalStyle;
        echo '</style>';
    endif;
    if ($additionalScripts) :
        echo '<script>';
        echo $additionalScripts;
        echo '</script>';
    endif;
    ?>
</head>
<body <?php body_class(); ?>>
<div class="site-wrapper">
<header class="header">
    <div class="container desktop">
        <?php
        if ($headerLogo && $enableGlobalLogo === false) :
        ?>
        <a href="<?php echo home_url(); ?>">
            <img src="<?php echo $headerLogo['url'] ?>" alt="<?php echo $headerLogo['alt'] ?>"
                 width="90" height="26">
        </a>
        <?php endif;?>

        <button class="header__burger">
            <div class="top">
                <span class="left"></span>
                <span class="right"></span>
            </div>
            <div class="mid">
                <span></span>
            </div>
            <div class="bot">
                <span class="left"></span>
                <span class="right"></span>
            </div>
        </button>
        <?php

        wp_nav_menu( [
            'theme_location'  => 'primary',
            'container'       => '',
            'echo'            => true,
            'items_wrap'      => '<ul class="site__menu header__menu">%3$s</ul>'
        ] );
        if ($headerButton) :
        ?>
        <a href="<?php echo $headerButton['url']?>" class="cta header__cta">
            <span><?php echo $headerButton['title']?></span>
        </a>
        <?php
        endif;
        ?>
    </div>
    <div class="container mobile">
        <?php
        if ($headerLogo && $enableGlobalLogo === false) :
            ?>
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo $headerLogo['url'] ?>" alt="<?php echo $headerLogo['alt'] ?>"
                     width="90" height="26">
            </a>
        <?php endif;
        if ($headerButton) :
        ?>
        <a href="<?php echo $headerButton['url']?>" class="cta header__cta">
            <span><?php echo $headerButton['title']?></span>
        </a>
        <?php
        endif;
        wp_nav_menu( [
            'theme_location'  => 'primary',
            'container'       => '',
            'echo'            => true,
            'items_wrap'      => '<ul class="site__menu header__menu">%3$s</ul>'
        ] );
        ?>
    </div>
</header>
<main class="main">