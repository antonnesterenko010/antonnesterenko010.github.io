<?php

define('THEME_VERSION', '1.0.1');
define( 'THEME_PATH', get_template_directory() );
define('THEME_PATH_URI', get_template_directory_uri() );

function theme_assets() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', [], null);
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Lora:wght@700&family=Manrope:wght@200..800&display=swap', [], null);
    wp_enqueue_style('reset-css', THEME_PATH_URI . '/assets/css/reset.css', [], THEME_VERSION);
    wp_enqueue_style('swiper-css', THEME_PATH_URI . '/assets/css/swiper-bundle.min.css', [], THEME_VERSION);
    wp_enqueue_style('style-css', THEME_PATH_URI . '/assets/css/style.css', [], THEME_VERSION);
    wp_enqueue_script('swiper-min-js', THEME_PATH_URI . '/assets/js/swiper-bundle.min.js', [], THEME_VERSION, true);
    wp_enqueue_script('wavesurfer-min-js', THEME_PATH_URI . '/assets/js/wavesurfer.min.js', [], THEME_VERSION, true);
    wp_enqueue_script('main-js', THEME_PATH_URI . '/assets/js/main.js', [], THEME_VERSION, true);

}
add_action('wp_enqueue_scripts', 'theme_assets');


if (function_exists('acf_add_options_page')) {

    acf_add_options_page([
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Site Options',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ]);

}

add_filter('wpcf7_autop_or_not', '__return_false');



?>