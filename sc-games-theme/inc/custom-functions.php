<?php

add_action('init', 'add_casino_post_types');

function add_casino_post_types()
{
    add_custom_post_type_casino();
    add_custom_taxonomy_casino();
}

add_action('wp_head', function (){
    $prefix = 'sc_games_';
    $options = get_option($prefix . 'options');
    if (isset($options[$prefix . 'header_code_insert']) && !empty($options[$prefix . 'header_code_insert'])) {
        echo $options[$prefix . 'header_code_insert'];
    }
});
add_action('wp_body_open', function (){
    $prefix = 'sc_games_';
    $options = get_option($prefix . 'options');
    if (isset($options[$prefix . 'body_code_insert']) && !empty($options[$prefix . 'body_code_insert'])) {
        echo $options[$prefix . 'body_code_insert'];
    }
});
add_action('wp_footer', function (){
    $prefix = 'sc_games_';
    $options = get_option($prefix . 'options');
    if (isset($options[$prefix . 'footer_code_insert']) && !empty($options[$prefix . 'footer_code_insert'])) {
        echo $options[$prefix . 'footer_code_insert'];
    }
});

function add_custom_post_type_casino()
{
    $args = [
        'label' => __('Games'),
        'public' => true,
        'exclude_from_search' => true,
        'has_archive' => true,
        'show_in_nav_menus' => false,
        'show_in_rest' => true,
        'supports' => ['title', 'thumbnail', 'editor'],
        'taxonomies' => ['review_casino']
    ];

    register_post_type('game', $args);
}

function add_custom_taxonomy_casino()
{
    register_taxonomy('review_casino', ['game'],
        [
            'hierarchical' => true,
            'labels' => [
                'name' => _x('Categories', 'taxonomy general name'),
                'singular_name' => _x('Category', 'taxonomy singular name'),
                'search_items' => __('Search Categories'),
                'all_items' => __('All Categories'),
                'parent_item' => __('Parent Category'),
                'parent_item_colon' => __('Parent Category:'),
                'edit_item' => __('Edit Category'),
                'update_item' => __('Update Category'),
                'add_new_item' => __('Add New Category'),
                'new_item_name' => __('New Category Name'),
                'menu_name' => __('Categories'),
            ],
            'show_ui' => true,
            'query_var' => true,
            'show_in_nav_menus' => true,
            'show_in_rest' => true
        ]
    );
}

function get_asset_img($file_name)
{
    return '<img src="' . THEME_PATH_URI . '/assets/img/' . $file_name . '">';
}

function get_d_asset_img($file_name)
{
    return '<img src="' . THEME_PATH_URI . '/assets/'.CURRENT_DESIGN.'/img/' . $file_name . '">';
}

function get_game_page_data($post_id){
    $options = get_option('sc_games_options');
    $data['play_btn'] = isset($options['sc_games_pln_btn']) && !empty($options['sc_games_pln_btn']) ? $options['sc_games_pln_btn'] : 'Play Now';
    $data['img_disclaimer'] = isset($options['sc_games_disclaimer']) && !empty($options['sc_games_disclaimer']) ? $options['sc_games_disclaimer'] : '';
    $data['show_related_posts'] = isset($options['sc_games_show_related_posts']) && !empty($options['sc_games_show_related_posts']);
    $data['related_posts_title'] = isset($options['sc_games_related_posts_title']) && !empty($options['sc_games_related_posts_title']) ? $options['sc_games_related_posts_title'] : 'Related Posts';
    $data['game_link'] = get_post_meta($post_id, 'game_page__link', true);
    $data['logo'] = get_post_meta($post_id, 'game_page__logo', true);
    $data['bg'] = get_post_meta($post_id, 'game_page__bg', true);
    $data['provider'] = get_post_meta($post_id, 'game_page__provider', true);
    $data['subtitle'] = get_post_meta($post_id, 'game_page__game_subtitle', true);

    return $data;
}

function get_index_page_data(){
    $prefix = 'sc_games_';
    $options = get_option($prefix . 'options');
    $data['play_btn'] = isset($options[$prefix.'pln_btn']) && !empty($options[$prefix.'pln_btn']) ? $options[$prefix.'pln_btn'] : 'Play Now';
    $data['hero_title'] = isset($options[$prefix . 'fp_hero_title']) && !empty($options[$prefix . 'fp_hero_title']) ? $options[$prefix . 'fp_hero_title'] : '';
    $data['hero_description'] = isset($options[$prefix . 'fp_hero_description']) && !empty($options[$prefix . 'fp_hero_description']) ? $options[$prefix . 'fp_hero_description'] : '';
    $data['hero_button_link'] = isset($options[$prefix . 'fp_hero_button_link']) && !empty($options[$prefix . 'fp_hero_button_link']) ? $options[$prefix . 'fp_hero_button_link'] : '';
    $data['hero_button_label'] = isset($options[$prefix . 'fp_hero_button_label']) && !empty($options[$prefix . 'fp_hero_button_label']) ? $options[$prefix . 'fp_hero_button_label'] : '';
    $data['htp_title'] = isset($options[$prefix . 'fp_htp_title']) && !empty($options[$prefix . 'fp_htp_title']) ? $options[$prefix . 'fp_htp_title'] : '';
    $data['htp_description'] = isset($options[$prefix . 'fp_htp_description']) && !empty($options[$prefix . 'fp_htp_description']) ? $options[$prefix . 'fp_htp_description'] : '';
    $data['htp_blocks'] = isset($options[$prefix . 'fp_htp_blocks']) && !empty($options[$prefix . 'fp_htp_blocks']) ? $options[$prefix . 'fp_htp_blocks'] : '';
    $data['games_title'] = isset($options[$prefix . 'fp_games_title']) && !empty($options[$prefix . 'fp_games_title']) ? $options[$prefix . 'fp_games_title'] : '';
    $data['games_description'] = isset($options[$prefix . 'fp_games_description']) && !empty($options[$prefix . 'fp_games_description']) ? $options[$prefix . 'fp_games_description'] : '';
    $data['newsletter_title'] = isset($options[$prefix . 'fp_newsletter_title']) && !empty($options[$prefix . 'fp_newsletter_title']) ? $options[$prefix . 'fp_newsletter_title'] : '';
    $data['newsletter_subtitle'] = isset($options[$prefix . 'fp_newsletter_subtitle']) && !empty($options[$prefix . 'fp_newsletter_subtitle']) ? $options[$prefix . 'fp_newsletter_subtitle'] : '';
    $data['newsletter_placeholder'] = isset($options[$prefix . 'fp_newsletter_placeholder']) && !empty($options[$prefix . 'fp_newsletter_placeholder']) ? $options[$prefix . 'fp_newsletter_placeholder'] : '';
    $data['newsletter_button_label'] = isset($options[$prefix . 'fp_newsletter_button_label']) && !empty($options[$prefix . 'fp_newsletter_button_label']) ? $options[$prefix . 'fp_newsletter_button_label'] : 'Submit';

    return $data;
}

function get_game_block()
{

}

function draw_rating_block($rating)
{
    $percent = $rating * 10;
    ?>
    <div class="rating">
        <div class="rating-inner" style="width: <?= $percent ?>%;">
            <div class="star"><img class="lazy-load-exclude" src="<?php echo get_template_directory_uri() ?>/assets/<?= CURRENT_DESIGN ?>/img/full-star.svg" alt="star"></div>
            <div class="star"><img class="lazy-load-exclude" src="<?php echo get_template_directory_uri() ?>/assets/<?= CURRENT_DESIGN ?>/img/full-star.svg" alt="star"></div>
            <div class="star"><img class="lazy-load-exclude" src="<?php echo get_template_directory_uri() ?>/assets/<?= CURRENT_DESIGN ?>/img/full-star.svg" alt="star"></div>
            <div class="star"><img class="lazy-load-exclude" src="<?php echo get_template_directory_uri() ?>/assets/<?= CURRENT_DESIGN ?>/img/full-star.svg" alt="star"></div>
            <div class="star"><img class="lazy-load-exclude" src="<?php echo get_template_directory_uri() ?>/assets/<?= CURRENT_DESIGN ?>/img/full-star.svg" alt="star"></div>
        </div>
        <div class="rating-outer">
            <div class="star"><img class="lazy-load-exclude" src="<?php echo get_template_directory_uri() ?>/assets/<?= CURRENT_DESIGN ?>/img/empty-star.svg" alt="star"></div>
            <div class="star"><img class="lazy-load-exclude" src="<?php echo get_template_directory_uri() ?>/assets/<?= CURRENT_DESIGN ?>/img/empty-star.svg" alt="star"></div>
            <div class="star"><img class="lazy-load-exclude" src="<?php echo get_template_directory_uri() ?>/assets/<?= CURRENT_DESIGN ?>/img/empty-star.svg" alt="star"></div>
            <div class="star"><img class="lazy-load-exclude" src="<?php echo get_template_directory_uri() ?>/assets/<?= CURRENT_DESIGN ?>/img/empty-star.svg" alt="star"></div>
            <div class="star"><img class="lazy-load-exclude" src="<?php echo get_template_directory_uri() ?>/assets/<?= CURRENT_DESIGN ?>/img/empty-star.svg" alt="star"></div>
        </div>
    </div>
    <?php
}