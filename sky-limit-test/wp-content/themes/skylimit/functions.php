<?php

define('THEME_VERSION', '1.0.1');
define( 'THEME_PATH', get_template_directory() );
define('THEME_PATH_URI', get_template_directory_uri() );

function theme_assets() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap', [], null);
    wp_enqueue_style('app-min-css', THEME_PATH_URI . '/dest/css/app.min.css', [], THEME_VERSION);
    wp_enqueue_script('app-min-js', THEME_PATH_URI . '/dest/js/app.min.js', [], THEME_VERSION, true);
}
add_action('wp_enqueue_scripts', 'theme_assets');

function register_my_menus() {
    register_nav_menus(
        array(
            'header_menu' => __( 'Header Menu' ),
            'footer_menu' => __( 'Footer Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );
add_theme_support( 'menus' );
add_theme_support( 'widgets' );

// Додаємо функцію для реєстрації області сайдбару
function register_left_sidebar() {
    register_sidebar(array(
        'name'          => __('Left Sidebar', 'skylimit'),
        'id'            => 'left_sidebar',
        'description'   => __('Left sidebar area.', 'skylimit'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));
}

// Викликаємо функцію реєстрації сайдбару
add_action('widgets_init', 'register_left_sidebar');

function register_right_sidebar() {
    register_sidebar(array(
        'name'          => __('Right Sidebar', 'skylimit'),
        'id'            => 'right_sidebar',
        'description'   => __('Right sidebar area.', 'skylimit'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'register_right_sidebar');



if (function_exists('acf_add_options_page')) {

    acf_add_options_page([
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Глобальньіе Опции',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ]);

}

add_filter('wpcf7_autop_or_not', '__return_false');


?>