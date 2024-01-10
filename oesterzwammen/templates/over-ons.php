<?php
/*
Template Name: Over Ons
*/
get_header(); ?>


<main class="page-over-ons">
    <?php

    while (have_posts()) :
        the_post();
        the_content();
    endwhile

    ?>
</main>

<?php get_footer();?>
