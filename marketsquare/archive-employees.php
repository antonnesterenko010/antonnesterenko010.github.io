<?php
/*
Template Name: Archive Employees
*/

get_header();

$taxonomy = 'type';
$postType = 'employees';
$terms = get_terms($taxonomy, [
    'hide_empty' => false,
]);
$post_per_page = -1;
$administrationTitle = get_field('administration_title', 'option');

$args =
    [
        'post_type'      => $postType,
        'posts_per_page' => $post_per_page,
        'post_status'    => 'publish',
        'orderby'        => 'title',
        'order'          => 'ASC',
        'tax_query'      => [
            [
                'taxonomy' => 'type',
                'terms'    => $terms[0]->term_id,
                'field'    => 'id',
                'operator' => 'NOT IN',
            ],
        ],

    ];
$query = new WP_Query($args);


$argsAdministration =
    [
        'post_type'      => $postType,
        'posts_per_page' => $post_per_page,
        'post_status'    => 'publish',
        'tax_query'      => [
            [
                'taxonomy' => 'type',
                'terms'    => $terms[0]->term_id,
                'field'    => 'id',
            ],
        ],
    ];
$queryAdministration = new WP_Query($argsAdministration);

$pass_masterPost = get_post();
?>
<?php if (post_password_required($pass_masterPost->ID) && !is_user_logged_in()): ?>
    <main class="protected">
        <div class="container-fluid max-width">
            <?php echo get_the_password_form(); ?>
        </div>
    </main>
<?php else: ?>

    <main id="primary" class="site-archive-employees">
        <?php
        while (have_rows('content', get_the_ID())) {
            the_row();
            get_template_part('templates/blocks/' . get_row_layout());
        }
        ?>
        <section class="archive-employees__wrapper">
            <div class="container-fluid max-width">
                <div class="archive-employees__main-content">
                    <?php if ($query->have_posts()) : while ($query->have_posts()) {
                        $query->the_post();
                        if (get_post_status($query->post->ID) === 'publish') {
                            get_template_part_var('templates/parts/single-employees', ['query' => $query]);
                        }
                        ?>
                    <?php } else : ?>
                        <p><?php echo __('There is no posts yet', 'marketsquare') ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

    </main><!-- #main -->

<?php
endif;
get_footer();