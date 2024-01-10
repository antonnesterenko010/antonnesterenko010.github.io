<?php

use inc\Ajax;
use ThemeOptions\PostType;
use ThemeOptions\EnqueueScripts;
use ThemeOptions\Options;
use ThemeOptions\AcfBlocksEnable;
use ThemeOptions\RegisterMenus;
use ThemeOptions\PostTaxonomy;


class Theme
{

    static function init()
    {
        self::autoload();
        self::registerThemeSettings();
        self::initThemeMethods();
        Ajax::init();
    }

    static function autoload()
    {
        require_once(realpath(get_template_directory()) . '/inc/loader.php');
    }

    static function registerThemeSettings()
    {
        new EnqueueScripts(self::themeStyles(), self::themeScripts());
        new Options();
        new AcfBlocksEnable(self::acfBlocks());
    }

    static function initThemeMethods()
    {
        self::addCustomPostType();
        self::addCustomTaxonomy();
        self::registerMenu();
        self::addImageSizes();
        self::customThemeHooks();
    }

    static function customThemeHooks()
    {

        add_action( 'pre_get_posts', [self::class,'set_posts_per_page_for_towns_cpt']);

        add_filter('show_admin_bar', '__return_false');
        add_theme_support('custom-logo');

    }

    static function acfBlocks(): array
    {
        $path = get_template_directory_uri() . '/dest/images/gutenberg/';
        return [
            'acf_block_hero' => ['title' => 'Hero Module', 'preview' => ''],
            'acf-block-content-image' => ['title' => 'Content With Image', 'preview' => ''],
            'acf-block-logos' => ['title' => 'Logos Block', 'preview' => ''],
            'acf-block-team' => ['title' => 'Team Block', 'preview' => ''],
            'acf-block-facts-slider' => ['title' => 'Facts Slider Block', 'preview' => ''],
            'acf-block-recipe-slider' => ['title' => 'Recipe Slider Block', 'preview' => ''],
            'acf-block-product-slider' => ['title' => 'Product Slider Block', 'preview' => ''],
            'acf-block-news-slider' => ['title' => 'News Slider Block', 'preview' => ''],
            'acf-block-recipe-slider2' => ['title' => 'Recipes Slider Block2', 'preview' => ''],
            'acf-block-product-hero' => ['title' => 'Product Hero', 'preview' => ''],
            'acf-block-about-product' => ['title' => 'About Product', 'preview' => ''],
            'acf-block-storage-advice' => ['title' => 'Storage Advice', 'preview' => ''],
            'acf-block-ingredients' => ['title' => 'Ingredients', 'preview' => ''],
            'acf-block-steps' => ['title' => 'Step Block', 'preview' => ''],
            'acf-block-all-product' => ['title' => 'All Product Block', 'preview' => ''],
            'acf-block-select-product' => ['title' => 'Select Product Block', 'preview' => ''],
        ];
    }


    static function themeStyles(): array
    {
        return [
            'app-style' => get_template_directory_uri() . '/dest/css/app.css',
            'swiper-bundle' => get_template_directory_uri() . '/dest/css/swiper-bundle.min.css',
            'style-admin' => get_template_directory_uri() . '/dest/css/style-admin.css',
        ];
    }

    static function themeScripts(): array
    {
        return [
            'app-script-imagesloaded-pkgd-min' =>
                [
                    'url' => get_template_directory_uri() . '/assets/js/libraries/imagesloaded.pkgd.min.js',
                    'connection' => ['jquery'],
                ],
            'app-script-owl-carousel-min' =>
                [
                    'url' => get_template_directory_uri() . '/assets/js/libraries/swiper-bundle.min.js',
                    'connection' => ['jquery'],
                ],
            'slider-class' =>
                [
                    'url' => get_template_directory_uri() . '/assets/js/inc/Slider.js',
                    'connection' => ['app-script-owl-carousel-min', 'app-script-imagesloaded-pkgd-min'],
                ],
            'animation-class' =>
                [
                    'url' => get_template_directory_uri() . '/assets/js/inc/Animation.js',
                    'connection' => ['gsap', 'gsap-scroll-trigger'],
                ],
            'gsap' =>
                [
                    'url' => get_template_directory_uri() . '/assets/js/libraries/gsap.min.js',
                    'connection' => ['jquery'],
                ],
            'gsap-scroll-trigger' =>
                [
                    'url' => get_template_directory_uri() . '/assets/js/libraries/ScrollTrigger.min.js',
                    'connection' => ['jquery'],
                ],
            'app-jquery-script' =>
                [
                    'url' => get_template_directory_uri() . '/assets/js/app_jquery.js',
                    'connection' => ['slider-class'],
                ],
            'app-animation-script' =>
                [
                    'url' => get_template_directory_uri() . '/assets/js/app_animation.js',
                    'connection' => ['animation-class'],
                ],
            'app-script' =>
                [
                    'url' => get_template_directory_uri() . '/assets/js/app.js',
                    'connection' => ['jquery'],
                ],
            'map-js' =>
                [
                    'url' => 'https://maps.googleapis.com/maps/api/js?&key=AIzaSyCqX5QZNVKjTZQKv2Re2J015CTfSRf-asY&callback=initMap',
                    'connection' => ['jquery','app-jquery-script' ],
                ],
        ];
    }


    static function addCustomPostType()
    {
        new PostType('Recepten', basename(__DIR__));
        new PostType('Products', basename(__DIR__));
//        new PostType('Blog', basename(__DIR__));
    }


    static function addCustomTaxonomy()
    {
        new PostTaxonomy('Recipes Type', 'recepten', basename(__DIR__));
    }


    static function registerMenu()
    {
        $menuArray = ['Main Header', 'Footer Left', 'Footer Right'];
        $registerAllMenuItems = new RegisterMenus('', basename(__DIR__), $menuArray);
        $registerAllMenuItems->addAction();
    }

    static function addImageSizes()
    {
        add_image_size('large', 1900, 800);
        add_image_size('medium', 800, 600);
        add_image_size('small', 400, 250);
    }

    static function set_posts_per_page_for_towns_cpt($query)
    {
        if (!is_admin() && is_post_type_archive('recepten')) {
            $query->set('posts_per_page', '7');
        }
    }
}


Theme::init();


