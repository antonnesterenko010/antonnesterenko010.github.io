<?php
get_header();

$singular_product = is_singular('products') ? 'products-single-main' : '';
?>

<main class="main-page <?php echo $singular_product; ?>">
    <?php
    while (have_posts()) :
        the_post();

        the_content();

    endwhile;
    ?>

</main>

<?php get_footer();
