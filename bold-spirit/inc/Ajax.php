<?php

namespace inc;
use ThemeOptions\Helpers;
use inc\CustomFunctions;
class Ajax
{


    static function init()
    {
        add_action('wp_ajax_load_more_posts', [self::class, 'load_more_posts']);
        add_action('wp_ajax_nopriv_load_more_posts', [self::class, 'load_more_posts']);
    }
    static function load_more_posts()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $postID = isset($_POST['postID']) ? intval($_POST['postID']) : '';
//        $items_per_page = 2;
        $offset = $page;

        $acfFieldKeys = [
            'content',
        ];
        $posts_fields = get_fields($postID);
        $posts = $posts_fields['flexible'][2]['content']['posts_list'];
        $has_more_items = count($posts) > ($offset );
        $sliced_items = array_slice($posts, $offset);

        ob_start();

        if (!empty($sliced_items)) {
            foreach ($sliced_items as $post_item) { ?>
                <li class="post">
                    <a href="<?php echo $post_item['url'] ?>" target="_blank" class="post-wrapper"
                        <?php if ($post_item['image']) {
                            ?>
                            style="background-image: url('<?php echo $post_item['image'] ?>')"
                            <?php
                        }
                        ?>>
                                <span class="btn post__btn">
                                    <span class="post__btn-bg">
                                    </span>
                                    <span>View website</span>
                                </span>
                        <span class="post-border"></span>
                    </a>
                </li>
                <?php
            }
        }

        $html = ob_get_clean();

        wp_send_json_success(array(
            'html' => $html,
            'hasMoreItems' => $has_more_items,
        ));

    }


}