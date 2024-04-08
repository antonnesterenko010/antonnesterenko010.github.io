<?php

define('THEME_VERSION', '1.0.1');
define( 'THEME_PATH', get_template_directory() );
define('THEME_PATH_URI', get_template_directory_uri() );

function theme_assets() {
    wp_enqueue_style('app-css', THEME_PATH_URI . '/dest/css/app.min.css', [], THEME_VERSION);
    wp_enqueue_script('fancybox-js', THEME_PATH_URI . '/dest/js/fancybox.umd.js', [], THEME_VERSION, true);
    wp_enqueue_script('nice-select2-js', THEME_PATH_URI . '/dest/js/nice-select2.js', [], THEME_VERSION, true);
    wp_enqueue_script('app-js', THEME_PATH_URI . '/dest/js/app.min.js', [], THEME_VERSION, true);
    if(is_front_page()) {
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css', [], THEME_VERSION);;
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', [], THEME_VERSION, true);
        wp_enqueue_script('slider-js', THEME_PATH_URI . '/dest/js/slider.min.js', [], THEME_VERSION, true);
    }
}
add_action('wp_enqueue_scripts', 'theme_assets');

if (function_exists('acf_add_options_page')) {

    acf_add_options_page([
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ]);

}
function theme_register_nav_menu() {
    register_nav_menu( 'primary', 'Main menu' );
    register_nav_menu( 'bottom', 'Footer Bottom menu' );
}
add_action( 'after_setup_theme', 'theme_register_nav_menu');

add_filter('wpcf7_autop_or_not', '__return_false');
add_theme_support('post-thumbnails');
?>