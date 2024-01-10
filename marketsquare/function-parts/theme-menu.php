<?php

/** Register Menus */
function marketsquareRegisterMenus()
{
    register_nav_menus(
        [
            'main-menu'   => esc_html__('Main menu', 'marketsquare'),
            'footer-menu' => esc_html__('Footer menu', 'marketsquare'),
            'header-menu-left' => esc_html__('Header menu Left', 'marketsquare'),
            'header-menu-right' => esc_html__('Header  menu Right', 'marketsquare'),
            'header-menu-locale' => esc_html__('Header  menu Locale', 'marketsquare'),
            'footer-menu-left' => esc_html__('Footer menu Left', 'marketsquare'),
            'footer-menu-right' => esc_html__('Footer menu Right', 'marketsquare'),
        ]
    );
}

add_action('after_setup_theme', 'marketsquareRegisterMenus');


function mainMenu()
{

    wp_nav_menu(
        [
            'theme_location' => 'main-menu',
            'menu'           => 'Main menu',
            'container'      => 'false',
            'menu_class'     => 'main-navigation__list',
            'menu_id'        => 'main-navigation-wrap',
        ]
    );
}

function headerMenuLeft()
{

    wp_nav_menu(
        [
            'theme_location' => 'header-menu-left',
            'menu'           => 'Header menu left',
            'container'      => 'false',
            'menu_class'     => 'main-navigation__list left-navigation__list',
            'menu_id'        => 'main-navigation-wrap',
        ]
    );
}
function headerMenuRight()
{

    wp_nav_menu(
        [
            'theme_location' => 'header-menu-right',
            'menu'           => 'Header menu right',
            'container'      => 'false',
            'menu_class'     => 'main-navigation__list right-navigation__list',
            'menu_id'        => 'main-navigation-wrap',
        ]
    );
}
function headerMenuLocale()
{

    wp_nav_menu(
        [
            'theme_location' => 'header-menu-locale',
            'menu'           => 'Header menu locale',
            'container'      => 'false',
            'menu_class'     => 'main-navigation__list locale-navigation__list',
            'menu_id'        => 'main-navigation-wrap',
        ]
    );
}

function footerMenu()
{
    wp_nav_menu(
        [
            'theme_location' => 'footer-menu',
            'menu'           => 'Footer menu',
            'container'      => 'false',
            'menu_class'     => 'site-footer__navigation',
            'menu_id'        => 'site-footer__nav-wrap',
        ]
    );
}
function footerMenuLeft()
{
    wp_nav_menu(
        [
            'theme_location' => 'footer-menu-left',
            'menu'           => 'Footer menu Left',
            'container'      => 'false',
            'menu_class'     => 'site-footer__navigation',
            'menu_id'        => 'site-footer__nav-wrap',
        ]
    );
}

function footerMenuRight()
{
    wp_nav_menu(
        [
            'theme_location' => 'footer-menu-right',
            'menu'           => 'Footer menu Right',
            'container'      => 'false',
            'menu_class'     => 'site-footer__navigation',
            'menu_id'        => 'site-footer__nav-wrap',
        ]
    );
}
