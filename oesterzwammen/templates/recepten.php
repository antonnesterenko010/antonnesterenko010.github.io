<?php
/*
Template Name: Recepten
*/
get_header(); ?>


<main class="page-recepten">
    <?php

    while (have_posts()) :
        the_post();
        the_content();
    endwhile

    ?>
</main>

<?php get_footer();?>
