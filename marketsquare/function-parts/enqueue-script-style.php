<?php

/**
 * Enqueue theme scripts and styles.
 */
function marketsquare_scripts()
{
    wp_enqueue_style('marketsquare-style', get_stylesheet_uri());
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/dest/owl.carousel.min.css', '', 1.0);
    wp_enqueue_style('marketsquare-app-style', get_template_directory_uri() . '/dest/app.css', '', time());
    wp_enqueue_style('player-styles', 'https://cdnjs.cloudflare.com/ajax/libs/mediaelement/5.1.0/mediaelementplayer.min.css', '', time());

    wp_enqueue_script("jquery");
    wp_enqueue_script('player-app-script', get_template_directory_uri() . '/assets/js/mediaplayer.min.js', ['jquery'], time(), true);
    wp_enqueue_script('marketsquare-app-script-imagesloaded-pkgd-min', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', ['jquery'], 1.0, true);
    wp_enqueue_script('marketsquare-app-script-owl-carousel-min', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', ['jquery'], 1.0, true);
    wp_enqueue_script('marketsquare-app-script-masonry-pkgd-min', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', ['jquery'], 1.0, true);
    wp_enqueue_script('gsap-scroll-trigger', get_template_directory_uri() . '/assets/js/ScrollTrigger.min.js', ['jquery'], 1.0, true);
    wp_enqueue_script('gsap', get_template_directory_uri() . '/assets/js/gsap.min.js', ['jquery'], 1.0, true);
    wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', ['jquery'], 1.0, true);
    wp_enqueue_script('glide', get_template_directory_uri() . '/assets/js/glide.js', ['jquery'], 1.0, true);
    wp_enqueue_script('animations-app-script', get_template_directory_uri() . '/assets/js/animations.js', ['gsap', 'gsap-scroll-trigger'], 1.0, true);
    wp_enqueue_script('marketsquare-app-script', get_template_directory_uri() . '/dest/app.min.js', ['jquery'], time(), true);
    wp_enqueue_script('google-map', 'https://maps.googleapis.com/maps/api/js?key=' . constant('GOOGLE_MAP') . '&callback=initMap', [], time(), true);


}

add_action('wp_enqueue_scripts', 'marketsquare_scripts');
add_action('wp_enqueue_scripts', 'ajaxUrl', 99);


function ajaxUrl()
{
    wp_localize_script('marketsquare-app-script', 'filters_ajax',
        [
            'url'       => admin_url('admin-ajax.php'),
            'theme_uri' => get_template_directory_uri(),
        ]
    );
}

/**
 * Enqueue admin styles.
 */
function my_admin_style()
{
    wp_enqueue_style('admin-styles', get_stylesheet_directory_uri() . '/style-admin.css');
}

add_action('admin_enqueue_scripts', 'my_admin_style');



