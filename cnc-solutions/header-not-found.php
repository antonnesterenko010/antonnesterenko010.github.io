<?php

use ThemeOptions\Helpers;

$fields = get_fields('options');

?>
<!doctype html>
<html <?php language_attributes(); ?> style="height: 100%;">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open();

?>
<header class="header">
    <div class="header-desktop">
        <div class="container">
            <div class="header-top">
                <?php if (Helpers::get($fields, 'header.left_label')) : ?>
                    <div class="header-top__item">
                        <?php if (Helpers::get($fields, 'header.left_icon')) : ?>
                            <div class="header-top__item__icon">
                                <img src="<?php echo Helpers::get($fields, 'header.left_icon') ?>" alt="wallet">
                            </div>
                        <?php endif; ?>
                        <h5 class="header-top__item__label">
                            <?php echo Helpers::get($fields, 'header.left_label') ?>
                        </h5>
                    </div>
                <?php endif;
                if (Helpers::get($fields, 'header.central_label')) : ?>
                    <div class="header-top__item">
                        <?php if (Helpers::get($fields, 'header.central_icon')) : ?>
                            <div class="header-top__item__icon">
                                <img src="<?php echo Helpers::get($fields, 'header.central_icon') ?>" alt="stopwatch">
                            </div>
                        <?php endif; ?>
                        <h5 class="header-top__item__label">
                            <?php echo Helpers::get($fields, 'header.central_label') ?>
                        </h5>
                    </div>
                <?php endif;
                if (Helpers::get($fields, 'header.right_label')) : ?>
                    <div class="header-top__item">
                        <?php if (Helpers::get($fields, 'header.right_icon')) : ?>
                            <div class="header-top__item__icon">
                                <img src="<?php echo Helpers::get($fields, 'header.right_icon') ?>" alt="truck">
                            </div>
                        <?php endif; ?>
                        <h5 class="header-top__item__label">
                            <?php echo Helpers::get($fields, 'header.right_label') ?>
                        </h5>
                    </div>
                <?php endif; ?>
            </div>
            <div class="header-block">
                <?php if (Helpers::get($fields, 'header.logo')) : ?>
                    <a href="<?php echo home_url(); ?>" class="header-logo">
                        <img src="<?php echo Helpers::get($fields, 'header.logo') ?>" alt="logo">
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
