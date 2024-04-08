<?php

$fields = get_fields('options');
$header_version = $fields['header']['header_version'];
$marquee_text = $fields['header']['marquee_text'];
$header_logo = $fields['header']['header_logo'];

$body_color = $fields['global']['body_color'];
$text_color = $fields['global']['text_color'];
$link_color = $fields['global']['link_color'];
$accent_color = $fields['global']['accent_color'];

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head() ?>
</head>


<body <?php body_class(); ?> style="--body-color: <?php echo $body_color?>; --text-color: <?php echo $text_color?>;
 --link-color: <?php echo $link_color?>; --accent-color: <?php echo $accent_color?>">
<div class="site-body">
    <?php
    if($header_version === 'first') :
    ?>
<header class="header first">
    <?php if ($marquee_text) : ?>
    <div class="marquee">
        <div class="marquee__container">
            <?php foreach($marquee_text as $item) : ?>
            <h5><?php echo $item['text_item']?></h5>
            <?php endforeach;?>
        </div>
    </div>
    <?php endif;?>
    <div class="container">
        <?php if ($header_logo) : ?>
        <a href="<?php echo home_url()?>" class="header__logo">
            <img src="<?php echo $header_logo['url']?>" alt="<?php echo $header_logo['alt']?>">
        </a>
        <?php endif;?>
        <?php
        wp_nav_menu(array(
                'container' => 'ul',
                'menu_class'=> 'header__menu',
                'theme_location'  => 'header_menu')
        );
        ?>


    </div>
</header>
    <?php
    endif;
    if($header_version === 'second') :
    ?>
    <header class="header second">
    <div class="container">
        <?php if ($header_logo) : ?>
        <a href="<?php echo home_url()?>" class="header__logo">
            <img src="<?php echo $header_logo['url']?>" alt="<?php echo $header_logo['alt']?>">
        </a>
        <?php endif;?>
        <?php
        wp_nav_menu(array(
                'container' => 'ul',
                'menu_class'=> 'header__menu',
                'theme_location'  => 'header_menu')
        );
        ?>


    </div>
</header>
    <?php
    endif;
    ?>