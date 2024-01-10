<?php
function get_template_part_var($template, $data = [])
{
    extract($data);
    require locate_template($template . '.php');
}

add_action('wp_ajax_cases_filter', 'ms_cases_filter');
add_action('wp_ajax_nopriv_cases_filter', 'ms_cases_filter');

function ms_cases_filter()
{
    $postPerPage = -1;
    $postType = 'cases';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $html = '';


    $arg = [
        'post_type'      => $postType,
        'posts_per_page' => $postPerPage,
        'post_status'    => 'publish',
    ];
    if ($category && $category !== 'all') {
        $arg1 = [
            'tax_query' => [
                [
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => $category,
                ],
            ],
        ];
        $arg = array_merge($arg, $arg1);
    }

    $query = new WP_Query($arg);


    if ($query->have_posts()) {
        ob_start();
        while ($query->have_posts()) {
            $query->the_post();
            if (get_post_status($query->post->ID) === 'publish') {
                $imgSize = 'cases-archive-img';
                get_template_part_var('templates/parts/single-case', ['query' => $query, 'imgSize' => $imgSize, 'first' => true]);
            }
        }
        $html = ob_get_contents();
        ob_end_clean();

    }

    wp_send_json(['posts' => $html]);

    die();

}

add_action('wp_ajax_news_infinity', 'ms_news_infinity');
add_action('wp_ajax_nopriv_news_infinity', 'ms_news_infinity');

function ms_news_infinity()
{
    $postPerPage = 6;
    $postType = 'news';
    $offset = isset($_POST['offset']) ? $_POST['offset'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $html = '';


    $arg = [
        'post_type'      => $postType,
        'posts_per_page' => $postPerPage,
        'post_status'    => 'publish',
        'offset'         => $offset,
    ];

    if ($category && $category !== 'all') {
        $arg1 = [
            'tax_query' => [
                [
                    'taxonomy' => 'category-news',
                    'field'    => 'slug',
                    'terms'    => $category,
                ],
            ],
        ];
        $arg = array_merge($arg, $arg1);
    }


    $query = new WP_Query($arg);

    $last = $query->post_count <= 0;


    if ($query->have_posts()) {
        ob_start();
        while ($query->have_posts()) {
            $query->the_post();
            if (get_post_status($query->post->ID) === 'publish') {
                get_template_part_var('templates/parts/single-case',
                    [
                        'query'   => $query,
                        'imgSize' => $postType,
                        'addSize' => 'news-additional',
                    ]
                );
            }
        }
        $html = ob_get_contents();
        ob_end_clean();

    }

    wp_send_json(['posts' => $html, 'last' => $last, 'offset' => $offset]);

    die();
}

add_action('wp_ajax_news_filter', 'ms_news_filter');
add_action('wp_ajax_nopriv_news_filter', 'ms_news_filter');

function ms_news_filter()
{
    $postPerPage = 8;
    $postType = 'news';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $html = '';


    $arg = [
        'post_type'      => $postType,
        'posts_per_page' => $postPerPage,
        'post_status'    => 'publish',
    ];

    if ($category && $category !== 'all') {
        $arg1 = [
            'tax_query' => [
                [
                    'taxonomy' => 'category-news',
                    'field'    => 'slug',
                    'terms'    => $category,
                ],
            ],
        ];
        $arg = array_merge($arg, $arg1);
    }

    $query = new WP_Query($arg);

    $i = 0;
    if ($query->have_posts()) {
        ob_start();
        while ($query->have_posts()) {
            $query->the_post();
            if (get_post_status($query->post->ID) === 'publish') {
                get_template_part_var('templates/parts/single-case',
                    [
                        'query'   => $query,
                        'imgSize' => $postType,
                        'first'   => ++$i === 1 ? true : false,
                        'addSize' => 'news-additional',
                    ]
                );
            }


        }
        $html = ob_get_contents();
        ob_end_clean();

    }

    wp_send_json(['posts' => $html]);

    die();

}

function marketsquare_main_args($postType, $post_per_page, $chooseType, $id)
{
    $args = [
        'post_type'      => $postType,
        'posts_per_page' => $post_per_page,
        'order'          => 'DESC',
        'orderby'        => 'ID',
        'post_status'    => 'publish',
    ];

    if ($chooseType === 'choose') {
        $args['post__in'] = $id;
    }
    return $args;
}

function redesign_marketsquare_main_args($postType, $post_per_page, $id)
{
    $args = [
        'post_type'      => $postType,
        'posts_per_page' => $post_per_page,
        'order'          => 'DESC',
        'orderby'        => 'ID',
        'post_status'    => 'publish',
        'post__in' => $id
    ];
    return $args;
}

function getImgUrl($file)
{
    return get_template_directory_uri() . '/dest/images/' . $file;
}

function styleControl() {

    $addBg = get_sub_field('add_custom_section_bg');
    $marginBottom = get_sub_field('margin_bottom') ? 'margin-bottom:' . get_sub_field('margin_bottom') . 'px' : '';

    if ($addBg) {
        $sectionBGColor = get_sub_field('section_bg_color');
        $customPadding = get_sub_field('paddings');
        $paddingTop = $customPadding ? $customPadding['padding_top'] : '';
        $paddingBottom = $customPadding ? $customPadding['padding_bottom'] : '';
        $padding = $customPadding ? 'padding:' . $paddingTop . 'px 0 ' . $paddingBottom . 'px' : '';
        $bgAdd = 'style="background-color:' . $sectionBGColor . ';' . $padding . ';' . $marginBottom .'"';
    } else {
        $bgAdd = 'style="' . $marginBottom . '"';
    }

    return $bgAdd;
}

function styleControlOptions() {

    $addBg = get_field('add_custom_section_bg', 'options');
    $marginBottom = get_field('margin_bottom','options') ? 'margin-bottom:' . get_field('margin_bottom', 'options') . 'px' : '';

    if ($addBg) {
        $sectionBGColor = get_field('section_bg_color', 'options');
        $customPadding = get_field('paddings', 'options');
        $paddingTop = $customPadding ? $customPadding['padding_top'] : '';
        $paddingBottom = $customPadding ? $customPadding['padding_bottom'] : '';
        $padding = $customPadding ? 'padding:' . $paddingTop . 'px 0 ' . $paddingBottom . 'px' : '';
        $bgAdd = 'style="background-color:' . $sectionBGColor . ';' . $padding . ';' . $marginBottom .'"';
    } else {
        $bgAdd = 'style="' . $marginBottom . '"';
    }

    return $bgAdd;
}

add_filter('webpc_attachment_paths', function($paths) {
    $suffix = '?original';
    foreach ($paths as $index => $path) {
        if (!preg_match('/(.*?)((-(.*))?)\.(jpe?g|png|gif)' . $suffix . '/', basename($path))) continue;
        unset($paths[$index]);
    }
    return $paths;
});