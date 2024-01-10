<?php
get_header();
?>

    <main class="page-default ">

        <div class="banner">
            <h1><?php the_title() ?></h1>
        </div>
        <div class="container">
            <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile

            ?>
        </div>

    </main>

<?php
get_footer();
