<?php
define ('THEME_VERSION', '1.0.2');
define( 'THEME_PATH_URI', get_template_directory_uri() );

add_theme_support( 'title-tag' );

add_action( 'wp_enqueue_scripts', 'theme_assets', 99 );
function theme_assets() {
    if(!is_admin()) wp_deregister_script( 'jquery');
    if (is_home() || is_front_page()) {
        wp_enqueue_style( 'home-page-css', THEME_PATH_URI . '/assets/css/home-page.css', [], THEME_VERSION );
        wp_enqueue_script( 'swiper-js', THEME_PATH_URI . '/assets/js/swiper-bundle.min.js', ['jquery'], THEME_VERSION, true);
        wp_enqueue_script( 'slider-js', THEME_PATH_URI . '/assets/js/slider.js', ['jquery'], THEME_VERSION, true);
    }
    if(is_404()  ){
        wp_enqueue_style( '404-css', THEME_PATH_URI . '/assets/css/404.css', [], THEME_VERSION );
    }
    if(is_page() && !is_home() && !is_front_page() ) {
        wp_enqueue_style( 'page-default-css', THEME_PATH_URI . '/assets/css/page-default.css', [], THEME_VERSION );
    }
    wp_enqueue_script( 'main', THEME_PATH_URI . '/assets/js/main.js', ['jquery'], THEME_VERSION, true);
}

add_action( 'after_setup_theme', 'theme_register_nav_menu');

function theme_register_nav_menu() {
    register_nav_menu( 'header-menu', 'Header Menu' );
    register_nav_menu( 'header-menu-default', 'Header Menu Default' );
    register_nav_menu( 'footer-menu', 'Footer Menu' );
}

add_filter( 'nav_menu_css_class', 'change_menu_header', 10, 4 );

function change_menu_header( $classes, $item, $args, $depth ) {
    if( $args->theme_location === 'header-menu' ){
        $classes[] = 'header-menu-item';
    }
    if ( $item ->current) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'change_menu_header_default', 10, 4 );

function change_menu_header_default( $classes, $item, $args, $depth ) {
    if( $args->theme_location === 'header-menu-default' ){
        $classes[] = 'header-menu-item';
    }
    if ( $item ->current) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'change_menu_footer', 10, 4 );

function change_menu_footer( $classes, $item, $args, $depth ) {
    if( $args->theme_location === 'footer-menu' ){
        $classes[] = 'footer-item';
    }
    if ( $item ->current) {
        $classes[] = 'active';
    }
    return $classes;
}

include 'inc/init.php';
include 'inc/custom-functions.php';


function niche_sanitization_func( $original_value, $args, $cmb2_field ) {
    return $original_value;
}

add_action('template_redirect', 'one_match_redirect');
function one_match_redirect() {
    if (is_search()) {
        wp_redirect( home_url(), 301 );
    }
}
add_action('wp_footer',  'theme_footer_scripts', 999);

function theme_footer_scripts() {
    $scripts = cmb2_get_option('niche_options', 'footer_textarea', false);

    if (!empty($scripts)) {
        echo PHP_EOL . '<!-- Custom scripts -->' . PHP_EOL . wp_unslash($scripts) . PHP_EOL . '<!-- /Custom scripts -->';
    }
}

add_action( 'wp_footer', 'jquery_to_footer' , 1 );
function jquery_to_footer() {
    global $wp_version;
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.min.js' ), false, $wp_version, true );
    wp_enqueue_script( 'jquery' );
    wp_register_script( 'jquery-migrate', includes_url( '/js/jquery/jquery-migrate.js' ), 'jquery', $wp_version, true );
    wp_enqueue_script( 'jquery-migrate' );
}