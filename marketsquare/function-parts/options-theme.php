<?php


add_action('after_setup_theme', 'marketsquare_setup');
if (!function_exists('marketsquare_setup')) :
    function marketsquare_setup()
    {

        add_theme_support('post-thumbnails');

        add_theme_support('html5');

    }
endif;

add_filter('upload_mimes', 'upload_allow_types');
function upload_allow_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';

    return $mimes;
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page([
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ]);
}


add_action('init', 'marketsquare_register_types');
function marketsquare_register_types()
{
    register_post_type('cases', [
        'labels'        => [
            'name'               => __('Cases', 'marketsquare'),
            'singular_name'      => __('Cases', 'marketsquare'),
            'add_new'            => __('Add Cases', 'marketsquare'),
            'add_new_item'       => __('Add Cases', 'marketsquare'),
            'edit_item'          => __('Edit Cases', 'marketsquare'),
            'new_item'           => __('New Cases', 'marketsquare'),
            'view_item'          => __('View Cases', 'marketsquare'),
            'search_items'       => __('Search Cases', 'marketsquare'),
            'not_found'          => 'Not found',
            'not_found_in_trash' => 'Not found in trash',
            'parent_item_colon'  => '',
            'menu_name'          => __('Cases', 'marketsquare'),
        ],
        'public'        => true,
        'menu_position' => 20,
        'menu_icon'     => 'dashicons-pressthis',
        'hierarchical'  => false,
        'show_in_rest'  => true,
        'supports'      => ['title', 'thumbnail'],
        'has_archive'   => false,
    ]);


    register_post_type('services', [
        'labels'        => [
            'name'               => __('Services', 'marketsquare'),
            'singular_name'      => __('Services', 'marketsquare'),
            'add_new'            => __('Add Services', 'marketsquare'),
            'add_new_item'       => __('Add Services', 'marketsquare'),
            'edit_item'          => __('Edit Services', 'marketsquare'),
            'new_item'           => __('New Services', 'marketsquare'),
            'view_item'          => __('View Services', 'marketsquare'),
            'search_items'       => __('Search Services', 'marketsquare'),
            'not_found'          => 'Not found',
            'not_found_in_trash' => 'Not found in trash',
            'parent_item_colon'  => '',
            'menu_name'          => __('Services', 'marketsquare'),
        ],
        'public'        => true,
        'menu_position' => 20,
        'menu_icon'     => 'dashicons-pressthis',
        'hierarchical'  => false,
        'show_in_rest'  => true,
        'supports'      => ['title', 'thumbnail'],
        'has_archive'   => false,
        'rewrite'      => array( 'slug' => 'services', 'with_front' => false ),
    ]);


    register_post_type('news', [
        'labels'        => [
            'name'               => __('News', 'marketsquare'),
            'singular_name'      => __('News', 'marketsquare'),
            'add_new'            => __('Add News', 'marketsquare'),
            'add_new_item'       => __('Add News', 'marketsquare'),
            'edit_item'          => __('Edit News', 'marketsquare'),
            'new_item'           => __('New News', 'marketsquare'),
            'view_item'          => __('View News', 'marketsquare'),
            'search_items'       => __('Search News', 'marketsquare'),
            'not_found'          => 'Not found',
            'not_found_in_trash' => 'Not found in trash',
            'parent_item_colon'  => '',
            'menu_name'          => __('News', 'marketsquare'),
        ],
        'public'        => true,
        'menu_position' => 20,
        'menu_icon'     => 'dashicons-pressthis',
        'hierarchical'  => false,
        'show_in_rest'  => true,
        'supports'      => ['title', 'thumbnail'],
        'has_archive'   => false,
    ]);

    register_post_type('employees', [
        'labels'        => [
            'name'               => __('Employees', 'marketsquare'),
            'singular_name'      => __('Employees', 'marketsquare'),
            'add_new'            => __('Add Employees', 'marketsquare'),
            'add_new_item'       => __('Add Employees', 'marketsquare'),
            'edit_item'          => __('Edit Employees', 'marketsquare'),
            'new_item'           => __('New Employees', 'marketsquare'),
            'view_item'          => __('View Employees', 'marketsquare'),
            'search_items'       => __('Search Employees', 'marketsquare'),
            'not_found'          => 'Not found',
            'not_found_in_trash' => 'Not found in trash',
            'parent_item_colon'  => '',
            'menu_name'          => __('Employees', 'marketsquare'),
        ],
        'public'        => true,
        'menu_position' => 20,
        'menu_icon'     => 'dashicons-pressthis',
        'hierarchical'  => false,
        'show_in_rest'  => true,
        'supports'      => ['title', 'thumbnail'],
        'has_archive'   => true,
    ]);


    register_taxonomy('category', 'cases', [
        'labels'       => [
            'name'          => __('Category', 'marketsquare'),
            'singular_name' => __('Category', 'marketsquare'),
            'search_items'  => 'Search Category',
            'all_items'     => 'All Category',
            'view_item '    => 'View Category',
            'edit_item'     => 'Edit Category',
            'update_item'   => 'Update',
            'add_new_item'  => 'Add Category',
            'new_item_name' => 'Add Category',
            'menu_name'     => __('Category', 'marketsquare'),
        ],
        'description'  => '',
        'public'       => true,
        'hierarchical' => true,
        'has_archive'  => true,
        'show_in_rest' => true,

    ]);

    register_taxonomy('type', 'employees', [
        'labels'       => [
            'name'          => __('Type', 'marketsquare'),
            'singular_name' => __('Type', 'marketsquare'),
            'search_items'  => 'Search Type',
            'all_items'     => 'All Type',
            'view_item '    => 'View Type',
            'edit_item'     => 'Edit Type',
            'update_item'   => 'Update',
            'add_new_item'  => 'Add Type',
            'new_item_name' => 'Add Type',
            'menu_name'     => __('Type', 'marketsquare'),
        ],
        'description'  => '',
        'public'       => true,
        'hierarchical' => true,
        'has_archive'  => true,
        'show_in_rest' => true,

    ]);


    register_taxonomy('category-news', 'news', [
        'labels'       => [
            'name'          => __('Category', 'marketsquare'),
            'singular_name' => __('Category', 'marketsquare'),
            'search_items'  => 'Search Category',
            'all_items'     => 'All Category',
            'view_item '    => 'View Category',
            'edit_item'     => 'Edit Category',
            'update_item'   => 'Update',
            'add_new_item'  => 'Add Category',
            'new_item_name' => 'Add Category',
            'menu_name'     => __('Category', 'marketsquare'),
        ],
        'description'  => '',
        'public'       => true,
        'hierarchical' => true,
        'has_archive'  => true,
        'show_in_rest' => true,

    ]);
}

add_action('admin_head', 'remove_content_editor');
function remove_content_editor()
{
    remove_post_type_support('page', 'editor');
}

