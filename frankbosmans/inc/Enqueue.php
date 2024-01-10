<?php

namespace inc;

use ThemeOptions\EnqueueScripts;

class Enqueue
{
    static function init()
    {
        new EnqueueScripts(self::themeStyles(), self::themeScripts(), self::flexibleStyles());
    }

    static function themeStyles(): array
    {
        $path = get_template_directory_uri() . '/dest/css/';
        return [
            'app-style'     => $path . 'main/app.min.css',
            'swiper-bundle' => $path . 'lib/swiper-bundle.min.css',
            'style-admin'   => $path . 'admin/style-admin.css',
        ];
    }

    static function flexibleStyles(): array
    {
        $css_path = '/dest/css/main/flexible/';
        return [
            'flexible' => ['css_path' => $css_path],
        ];
    }

    static function themeScripts(): array
    {
        return [
            'app-script-imagesloaded-pkgd-min' =>
                [
                    'url'        => get_template_directory_uri() . '/assets/js/libraries/imagesloaded.pkgd.min.js',
                    'connection' => ['jquery'],
                ],
            'app-script-owl-carousel-min'      =>
                [
                    'url'        => get_template_directory_uri() . '/assets/js/libraries/swiper-bundle.min.js',
                    'connection' => ['jquery'],
                ],
            'slider-class'                     =>
                [
                    'url'        => get_template_directory_uri() . '/assets/js/inc/Slider.js',
                    'connection' => ['app-script-owl-carousel-min', 'app-script-imagesloaded-pkgd-min'],
                ],
            'animation-class'                  =>
                [
                    'url'        => get_template_directory_uri() . '/assets/js/inc/Animation.js',
                    'connection' => ['gsap', 'gsap-scroll-trigger'],
                ],
            'gsap'                             =>
                [
                    'url'        => get_template_directory_uri() . '/assets/js/libraries/gsap.min.js',
                    'connection' => ['jquery'],
                ],
            'gsap-scroll-trigger'              =>
                [
                    'url'        => get_template_directory_uri() . '/assets/js/libraries/ScrollTrigger.min.js',
                    'connection' => ['jquery'],
                ],
            'app-script'                       =>
                [
                    'url'        => get_template_directory_uri() . '/dest/js/app.min.js',
                    'connection' => ['jquery'],
                ],
            'dynamic-adapt'                    =>
                [
                    'url'        => get_template_directory_uri() . '/assets/js/libraries/dynamicAdapt.js',
                    'connection' => ['jquery'],
                ],
        ];
    }
}