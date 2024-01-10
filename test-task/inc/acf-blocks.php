<?php

function filter_block_categories_when_post_provided($block_categories, $editor_context)
{
    if (!empty($editor_context->post)) {
        array_push(
            $block_categories,
            array(
                'slug' => 'acf-blocks',
                'title' => __('ACF Blocks', 'acf-block'),
                'icon' => null,
            ),
            array(
                'slug' => 'single-articles-blocks',
                'title' => __('Single Article Blocks', 'single-articles-block'),
                'icon' => null,
            ),

        );
    }
    return $block_categories;
}


add_filter('block_categories_all', 'filter_block_categories_when_post_provided', 10, 2);
function acf_block($slug, $name, $url, $category)
{
    if (function_exists('acf_register_block')) {
        $result = acf_register_block(
            array(
                'name' => $slug . '_block',
                'title' => __($name),
                'description' => __(''),
                'render_callback' => 'block_render',
                'render_template' => "templates/acf-blocks/" . $url . "-block.php",
                'category' => $category,
                'icon' => 'list-view',
                'example' => array(
                    'attributes' => array(
                        'mode' => 'preview',
                        'data' => array(
                            'image' => '<img src="' . get_template_directory_uri() . '/template-parts/blocks/img/' . $slug . '.jpg' . '" style="width:100%;display: block; margin: 0 auto;">'
                        ),
                    ),
                ),
            )
        );
    }
}

/**
 * Callback block render,
 * return preview image
 */
function block_render($block, $content = '', $is_preview = false)
{
    /**
     * Back-end preview
     */
    if ($is_preview && !empty($block['data'])) {
        echo $block['data']['image'];
        return;
    } else {
        if ($block) :
            $template = $block['render_template'];
            $template = str_replace('.php', '', $template);
            get_template_part('/' . $template);
        endif;
    }
}


acf_block('intro', 'Intro Block', 'intro', 'acf-blocks');
acf_block('solutions', 'Solutions Block', 'solutions', 'acf-blocks');
acf_block('expectations', 'Expectations Block', 'expectations', 'acf-blocks');
acf_block('subscribe', 'Subscribe Block', 'subscribe', 'acf-blocks');
acf_block('feedback', 'Feedback Block', 'feedback', 'acf-blocks');
acf_block('info', 'Info Block', 'info', 'acf-blocks');