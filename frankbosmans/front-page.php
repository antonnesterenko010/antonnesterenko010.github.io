<?php
get_header();
?>

    <main class="front-page">
        <?php
        while (have_rows('flexible', get_the_ID())) :
            the_row();
            get_template_part('template-parts/blocks/' . get_row_layout());

        endwhile;
        ?>

    </main>

<?php
get_footer();
