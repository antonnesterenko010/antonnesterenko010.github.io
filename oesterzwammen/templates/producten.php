<?php
/*
Template Name: Producten
*/
get_header(); ?>


<main class="page-producten">
    <?php

    while (have_posts()) :
        the_post();
        the_content();
    endwhile

    ?>
</main>

<?php get_footer();?>
