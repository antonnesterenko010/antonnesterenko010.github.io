<?php
/*
Template Name: Archive News
*/

get_header();

$taxonomy = 'category-news';
$postType = 'news';
$post_per_page = 8;
$filterTitle = get_field('filter_title', 'option');
$filterAll = get_field('filter_all', 'option');
$filterOn = get_field('news_filter_onoff', 'option');
$args =
    [
        'post_type'      => $postType,
        'posts_per_page' => $post_per_page,
        'post_status'    => 'publish',
    ];
$query = new WP_Query($args);

$argsTax = [
    'hide_empty' => false,
];

$terms = get_terms($taxonomy, $argsTax);
$i = 0;
$pass_masterPost = get_post();
?>
<?php if (post_password_required($pass_masterPost->ID) && !is_user_logged_in()): ?>
    <main class="protected">
        <div class="container-fluid max-width">
            <?php echo get_the_password_form(); ?>
        </div>
    </main>
<?php else: ?>
    <main id="primary" class="site-archive-news">
        <?php
        while (have_rows('content', get_the_ID())) {
            the_row();
            get_template_part('templates/blocks/' . get_row_layout());
        }
        ?>
        <section class="archive-news__wrapper">
            <div class="container-fluid max-width">
                <?php if ($filterOn) : ?>
                    <div class="archive-news__filter">
                        <p class="archive-news__filter__title"><?php echo $filterTitle ? $filterTitle : '' ?></p>
                        <?php if ($terms) : ?>
                            <ul class="archive-news__filter__items">
                                <li data-category="all" class="archive-news__filter__item">
                                    <a href="#"><?php echo $filterAll ? $filterAll : '' ?></a>
                                </li>
                                <?php foreach ($terms as $term) : ?>
                                    <li data-category="<?php echo $term->slug ?>" class="archive-news__filter__item">
                                        <a href="#"><?php echo $term->name ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="archive-news__main-content">
                    <?php if ($query->have_posts()) : while ($query->have_posts()) {
                        $query->the_post();
                        if (get_post_status($query->post->ID) === 'publish') {
                            get_template_part_var('templates/parts/single-case',
                                [
                                    'query'   => $query,
                                    'imgSize' => $postType,
                                    'first'   => ++$i === 1 ? true : false,
                                    'addSize' => 'news-additional',
                                ]
                            );
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