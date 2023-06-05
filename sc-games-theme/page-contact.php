<?php
/*
Template Name: Contact Us
Template Post Type: page
*/
get_header();
global $post;
if (isset($post->ID)) {
    get_template_part('template-parts/' . CURRENT_DESIGN . '/page-contact');
}
get_footer();