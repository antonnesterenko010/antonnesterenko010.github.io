<?php

define('THEME_VERSION', '1.0.1');
define( 'THEME_PATH', get_template_directory() );
define('THEME_PATH_URI', get_template_directory_uri() );

function theme_assets() {
    wp_enqueue_style('custom-fonts', 'https://fonts.cdnfonts.com/css/qanelas', [], null);
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap', [], null);
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css', [], null);
    wp_enqueue_script('waypoints-js', 'https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js', array('jquery'), '4.0.1', true);
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', [], null);
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', [], null);
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], null);
    wp_enqueue_style('slick-carousel-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', [], null);
    wp_enqueue_style('style-css', THEME_PATH_URI . '/assets/css/style.min.css', [], THEME_VERSION);
    wp_enqueue_script('drawer-js', THEME_PATH_URI . '/assets/js/drawer.min.js', ['jquery'], THEME_VERSION, true);
    wp_enqueue_script('jquery-mask-js', THEME_PATH_URI . '/assets/js/jquery.mask.min.js', ['jquery'], THEME_VERSION, true);
    wp_enqueue_script('nice-select-js', THEME_PATH_URI . '/assets/js/nice-select.min.js', ['jquery'], THEME_VERSION, true);
    wp_enqueue_script('slider-js', THEME_PATH_URI . '/assets/js/slider.min.js', ['jquery'], THEME_VERSION, true);
    wp_enqueue_script('tabs-js', THEME_PATH_URI . '/assets/js/tabs.min.js', ['jquery'], THEME_VERSION, true);
    wp_enqueue_script('thank-you-message-js', THEME_PATH_URI . '/assets/js/thank-you-message.min.js', [], THEME_VERSION, true);
}
add_action('wp_enqueue_scripts', 'theme_assets');


function waypoints_script($tag, $handle, $src) {
    if ($handle === 'waypoints-js') {
        $waypointIntegrity = 'sha512-ZKNVEa7gi0Dz4Rq9jXcySgcPiK+5f01CqW+ZoKLLKr9VMXuCsw3RjWiv8ZpIOa0hxO79np7Ec8DDWALM0bDOaQ==';
        $waypointAttr = array(
            'integrity'     => $waypointIntegrity,
            'crossorigin'   => 'anonymous',
            'referrerpolicy' => 'no-referrer',
        );

        foreach ($waypointAttr as $attr_name => $attr_value) {
            $tag = str_replace(" src=", " $attr_name=\"$attr_value\" src=", $tag);
        }
    }

    return $tag;
}

add_filter('script_loader_tag', 'waypoints_script', 10, 3);

require_once( THEME_PATH . '/inc/acf-blocks.php');



if (function_exists('acf_add_options_page')) {

    acf_add_options_page([
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ]);

}

add_filter('wpcf7_autop_or_not', '__return_false');
add_theme_support('post-thumbnails');
add_image_size('intro-wide', 1600, 400, false);


?>