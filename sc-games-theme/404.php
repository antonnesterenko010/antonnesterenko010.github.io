<?php
get_header();
global $post;
if (isset($post->ID)) {
    echo '<h1>404: Page Not found</h1>';
}
get_footer();