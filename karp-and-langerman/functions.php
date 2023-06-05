<?php
define ('THEME_VERSION', '1.0.1');
define( 'THEME_PATH', get_template_directory() );
define( 'THEME_PATH_URI', get_template_directory_uri() );


add_theme_support( 'title-tag' );

add_action( 'wp_enqueue_scripts', 'theme_assets', 99 );
function theme_assets() {
    if(!is_admin()) wp_deregister_script( 'jquery');
    if (is_home() || is_front_page()) {
        wp_enqueue_style( 'home-page-css', THEME_PATH_URI . '/assets/css/home-page.css', [], THEME_VERSION );
    }
    if(is_404() ){
        wp_enqueue_style( '404-css', THEME_PATH_URI . '/assets/css/404.css', [], THEME_VERSION );
    }
    if (is_page_template('page-services.php')) {
        wp_enqueue_style( 'services-css', THEME_PATH_URI . '/assets/css/services.css', [], THEME_VERSION );
    }
    if (is_page_template('page-people.php')) {
        wp_enqueue_style( 'services-css', THEME_PATH_URI . '/assets/css/people.css', [], THEME_VERSION );
    }
    if(is_page( array()) && (!is_page_template('page-people.php')) && (!is_page_template('page-services.php')) && (!is_front_page()) && (!is_404()) ) {
        wp_enqueue_style( 'page-default-css', THEME_PATH_URI . '/assets/css/page-default.css', [], THEME_VERSION );
    }
    wp_enqueue_script( 'main', THEME_PATH_URI . '/assets/js/main.js', ['jquery'], THEME_VERSION, true);
}

add_action( 'after_setup_theme', 'theme_register_nav_menu');

function theme_register_nav_menu() {
    register_nav_menu( 'primary', 'Main menu' );
}

add_filter( 'nav_menu_css_class', 'change_menu_header_desktop', 10, 4 );

function change_menu_header_desktop( $classes, $item, $args, $depth ) {
    if( $args->theme_location === 'header-menu' ){
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
        $classes[] = 'footer-menu-item';
    }
    if ( $item ->current) {
        $classes[] = 'active';
    }
    return $classes;
}


/*add_filter('walker_nav_menu_start_el', 'add_description_to_menu', 10, 4);
function add_description_to_menu($item_output, $item, $depth, $args) {

    if (strlen($item->description) > 0 ) {
        // append description after link
        $item_output .= sprintf('<span class="description">%s</span>', esc_html($item->description));

        // or.. insert description as last item inside the link ($item_output ends with "</a>{$args->after}")
//         $item_output = substr($item_output, 0, -strlen("</a>{$args->after}")) . sprintf('<span class="description">%s</span >', esc_html($item->description)) . "</a>{$args->after}";
    }
    return $item_output;
}*/


include 'inc/init.php';
include 'inc/custom-functions.php';


function kl_sanitization_func( $original_value, $args, $cmb2_field ) {
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
    $scripts = cmb2_get_option('kl_options', 'footer_textarea', false);

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

require THEME_PATH . '/inc/class-kl-walker.php';