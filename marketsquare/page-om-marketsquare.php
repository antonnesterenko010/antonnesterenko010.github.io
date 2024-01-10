<?php
/*
Template Name: Om Marketsquare
*/

get_header();
$pass_masterPost = get_post();
?>
<?php if (post_password_required($pass_masterPost->ID) && !is_user_logged_in()): ?>
    <main class="protected">
        <div class="container-fluid max-width">
            <?php echo get_the_password_form(); ?>
        </div>
    </main>
<?php else: ?>
    <main class="site-market">
        <?php
        while (have_rows('content', get_the_ID())) {
            the_row();
            get_template_part('templates/blocks/' . get_row_layout());
        }
        ?>

    </main><!-- #main -->

<?php
endif;
get_footer();