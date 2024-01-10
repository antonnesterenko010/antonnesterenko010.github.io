<?php
/*
Template Name: Archive Cases
*/

get_header();

$paddingTop = get_field('padding_top');
$paddingTopMobile = get_field('padding_top_mobile');

$title = get_field('title');
$since = get_field('since');

$taxonomy = 'category';
$postType = 'cases';
$post_per_page = -1;
$filterTitle = get_field('filter_title', 'option');
$filterAll = get_field('filter_all', 'option');
$args =
    [
        'post_type'      => $postType,
        'posts_per_page' => $post_per_page,
        'post_status'    => 'publish',
        'has_password'   => false,
    ];
$query = new WP_Query($args);

$argsTax = [
    'hide_empty' => false,
];
$terms = get_terms($taxonomy, $argsTax);

$hideFilter = get_field('hide_case', 'option');
$pass_masterPost = get_post();
$count = 0;
?>
<?php if (post_password_required($pass_masterPost->ID) && !is_user_logged_in()): ?>
    <main class="protected">
        <div class="container-fluid max-width">
            <?php echo get_the_password_form(); ?>
        </div>
    </main>
<?php else: ?>
    <main id="primary" class="site-archive-cases" style="--padding-top:<?php echo $paddingTop; ?>px;--padding-top-mobile:<?php echo $paddingTopMobile; ?>px;">
        <?php
        while (have_rows('content', get_the_ID())) {
            the_row();
            get_template_part('templates/blocks/' . get_row_layout());
        }
        ?>
        <section class="archive-cases__wrapper">
            <div class="container-fluid max-width">
                <div class="cases-top">
                    <h1><?php echo $title; ?></h1>
                    <div></div>
                    <div class="cases-pcs">
                        <p><?php echo $since; ?></p>
                        <p class="pcs"><?php echo $query->found_posts; ?> stk</p>
                    </div>
                </div>
                <div class="archive-cases__grid">
                    <?php if ($query->have_posts()) : while ($query->have_posts()) {
                        $query->the_post();
                        if (get_post_status($query->post->ID) === 'publish') {
                            $imgSize = 'full';
                            get_template_part_var('templates/parts/single-case', ['key' => $count, 'query' => $query, 'imgSize' => $imgSize, 'first' => true]);
                            $count++;
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
