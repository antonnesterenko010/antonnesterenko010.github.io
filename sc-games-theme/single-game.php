<?php
get_header();
global $post;
if (isset($post->ID)) {
    get_template_part('template-parts/' . CURRENT_DESIGN . '/single-game');
}
get_footer();