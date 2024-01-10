<?php

use ThemeOptions\Helpers;

$fields = get_fields('options');

?>
<!doctype html>
<html <?php language_attributes(); ?>>
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
                <div class="header-button__wrapper">
                    <?php if (Helpers::get($fields, 'header.button.url')) : ?>
                        <a href="<?php echo Helpers::get($fields, 'header.button.url') ?>" class="header-button button">
                        <span class="button-name button-name__primary">
                            <?php echo Helpers::get($fields, 'header.button.title'); ?>
                        </span>
                            <span class="button-name button-name__hover">
                            <?php echo Helpers::get($fields, 'header.button.title'); ?>
                        </span>
                        </a>
                    <?php endif; ?>
                    <div class="header-burger">
                        <div class="header-burger__icon">
                            <span class="line-1"></span>
                            <span class="line-2"></span>
                            <span class="line-3"></span>
                        </div>
                        <?php if (Helpers::get($fields, 'header.open_menu_label')) : ?>
                            <div class="header-burger__label"><?php echo Helpers::get($fields, 'header.open_menu_label') ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mobile">
        <div class="header-top">
            <div class="container">
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
        </div>
        <div class="header-block">
            <div class="container">
                <?php if (Helpers::get($fields, 'header.big_label_title')) : ?>
                    <div class="header-block__decor"><?php echo Helpers::get($fields, 'header.big_label_title') ?></div>
                <?php endif; ?>
                <div class="header-block__column">
                    <div class="header-block__column__content">
                        <?php if (Helpers::get($fields, 'header.logo')) : ?>
                            <a href="<?php echo home_url(); ?>" class="header-logo">
                                <img src="<?php echo Helpers::get($fields, 'header.logo') ?>" alt="logo">
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="header-block__column">
                    <div class="header-block__column__content">
                    </div>
                </div>
                <div class="header-block__column">
                    <div class="header-block__column__content">
                        <div class="header-button__wrapper">
                            <?php if (Helpers::get($fields, 'header.button.url')) : ?>
                                <a href="<?php echo Helpers::get($fields, 'header.button.url') ?>"
                                   class="header-button button">
                        <span class="button-name button-name__primary">
                            <?php echo Helpers::get($fields, 'header.button.title'); ?>
                        </span>
                                    <span class="button-name button-name__hover">
                            <?php echo Helpers::get($fields, 'header.button.title'); ?>
                        </span>
                                </a>
                            <?php endif; ?>
                            <div class="header-burger">
                                <div class="header-burger__icon">
                                    <span class="line-1"></span>
                                </div>
                                <?php if (Helpers::get($fields, 'header.close_menu_label')) : ?>
                                    <div class="header-burger__label"><?php echo Helpers::get($fields, 'header.close_menu_label') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <ul class="header-menu">
                            <?php
                            if (Helpers::get($fields, 'header.menu_list')) :
                                foreach (Helpers::get($fields, 'header.menu_list') as $key => $item) : ?>
                                    <li class="header-menu__item">
                                        <span class="header-menu__item__counter">0<?php echo $key + 1 ?></span>
                                        <a href="<?php echo $item['link']['url'] ?>"
                                           class="header-menu__item__title"><?php echo $item['link']['title'] ?></a>
                                    </li>
                                <?php endforeach;
                            endif;
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-bottom__item">
                    <?php if (Helpers::get($fields, 'header.left_text')) : ?>
                        <div class="header-block__column__footer">
                            <?php echo Helpers::get($fields, 'header.left_text') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="header-bottom__item">
                    <?php if (Helpers::get($fields, 'header.central_text')) : ?>
                        <div class="header-block__column__footer">
                            <?php echo Helpers::get($fields, 'header.central_text') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="header-bottom__item">
                    <?php if (Helpers::get($fields, 'header.right_text')) : ?>
                        <div class="header-block__column__footer">
                            <?php echo Helpers::get($fields, 'header.right_text') ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>
