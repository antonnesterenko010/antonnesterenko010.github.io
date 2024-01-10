<?php

foreach (glob(get_template_directory() . '/function-parts/*.php') as $file) {
    require $file;
}

//add_filter('show_admin_bar', '__return_false');

add_theme_support('title-tag');

add_filter('wpseo_canonical', '__return_false');
