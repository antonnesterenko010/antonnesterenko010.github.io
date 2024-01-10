<?php
get_header();

$prevPost = get_previous_post() ? get_previous_post()->ID : get_next_post()->ID;
$post_id = get_field('choose_next_post') ? get_field('choose_next_post') : $prevPost;
$nextPostBg = get_field('choose_main_color', $post_id);
$pass_masterPost = get_post();
?>
<?php if (post_password_required($pass_masterPost->ID) && !is_user_logged_in()): ?>
    <main class="protected">
        <div class="container-fluid max-width">
            <?php echo get_the_password_form(); ?>
        </div>
    </main>
<?php else: ?>
    <main class="single-cases">
        <?php
        while (have_rows('content', get_the_ID())) {
            the_row();
            get_template_part('templates/blocks/' . get_row_layout());
        }
        ?>
        <section class="pagination__module">
            <div class="container-fluid max-width">
                <div class="pagination__wrapper" <?php echo $nextPostBg ? 'style="background-color:' . $nextPostBg . '"' : ''; ?>>
                    <?php
                    $shortDesc = get_field('short_description', $post_id);
                    $linkText = get_field('cases_text_link', $post_id);
                    $nextPostTitle = get_field('next_case_title', 'option');
                    $caseArchiveLink = get_field('case_archive', 'option');
                    ?>
                    <div class="pagination__content-wrapper">
                        <div class="pagination__content-wrapper__left">
                            <p class="pagination__next-title"><?php echo $nextPostTitle ? $nextPostTitle : '' ?></p>
                            <a href="<?php echo $caseArchiveLink ?>" class="pagination__link link-arrow-white">
                                <?php get_template_part_var('templates/parts/arrow'); ?>
                                <?php _e('All cases', 'marketsquare') ?>
                            </a>
                        </div>
                        <div class="pagination__info-wrapper">
                            <p class="pagination__title"><?php echo get_the_title($post_id) ?></p>
                            <p class="pagination__desc"><?php echo $shortDesc ? $shortDesc : '' ?></p>
                            <a href="<?php echo get_the_permalink($post_id) ?>" class="pagination__link link-arrow-white">
                                <?php echo $linkText ? $linkText : '' ?>
                                <?php get_template_part_var('templates/parts/arrow'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- #main -->

<?php
endif;
get_footer();