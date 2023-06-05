<?php
define('THEME_VERSION', '1.6.0');
define('THEME_PATH_URI', get_template_directory_uri());
$prefix = 'sc_games_';
$options = get_option($prefix . 'options');


if (isset($options[$prefix . 'design_type']) && !empty($options[$prefix . 'design_type'])) {
    define('CURRENT_DESIGN', $options[$prefix . 'design_type']);
} else {
    define('CURRENT_DESIGN', 'design-0');
}

add_action('after_setup_theme', 'theme_setup');
function theme_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    register_nav_menus(
        [
            'primary' => __('Navigation Menu', 'sh-theme'),
        ]
    );
}

add_action('wp_enqueue_scripts', 'theme_assets');
function theme_assets()
{
    wp_enqueue_style('theme-style-css', THEME_PATH_URI . '/style.css', [], THEME_VERSION);
    wp_enqueue_style('main-style-css', THEME_PATH_URI . '/assets/' . CURRENT_DESIGN . '/css/style.css', [], THEME_VERSION);

    if ((CURRENT_DESIGN == 'design-4' ) || (CURRENT_DESIGN == 'design-7') || (CURRENT_DESIGN == 'design-8') || (CURRENT_DESIGN == 'design-19') || (CURRENT_DESIGN == 'design-20') || (CURRENT_DESIGN == 'design-24') || (CURRENT_DESIGN == 'design-29')) {
        wp_enqueue_style('swiper-css', THEME_PATH_URI . '/assets/' . CURRENT_DESIGN . '/css/swiper-bundle.min.css', [], THEME_VERSION);
        wp_enqueue_script('swiper-js', THEME_PATH_URI . '/assets/' . CURRENT_DESIGN . '/js/swiper-bundle.min.js', ['jquery'], THEME_VERSION, true);
    }
    wp_enqueue_script('main-js', THEME_PATH_URI . '/assets/' . CURRENT_DESIGN . '/js/main.js', ['jquery'], THEME_VERSION, true);
    
}

include 'inc/custom-functions.php';
include 'inc/cmb2/init.php';
include 'inc/cmb2/tabs/cmb2-tabs.php';
include 'inc/cmb2/game-options.php';
include 'inc/cmb2/contact-options.php';
include 'inc/cmb2/register-options.php';
include 'inc/cmb2/theme-options.php';