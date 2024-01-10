<?php
/*
Template Name: Teeltproces
*/
get_header(); ?>


<main class="page-teeltproces">
    <?php

    while (have_posts()) :
        the_post();
        the_content();
    endwhile

    ?>
</main>

<?php get_footer();?>
