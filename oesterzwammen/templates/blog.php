<?php
/* Template Name: Blog Template */

get_header();

$fields = get_fields('options');

use ThemeOptions\Helpers;

$currentPage = get_query_var('paged') ? get_query_var('paged') : 1;
$post_per_page = get_option('posts_per_page');
$args = [
    'post_type' => 'post',
    'paged' => $currentPage,
    'posts_per_page' => $post_per_page,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
];
$query = new WP_Query($args);


?>

    <main class="page-blog">

        <section class="hero-module-block"
                 style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%), linear-gradient(0deg, rgba(203, 187, 157, 0.50) 0%, rgba(203, 187, 157, 0.50) 100%), url('<?php echo wp_get_attachment_image_url(Helpers::get($fields, 'background_blog'), 'full'); ?>') no-repeat 50% center/cover lightgray;">
            <span class="hero-bg"></span>
            <div class="block-container">
                <h1 class="home-title"><?php echo Helpers::get($fields, 'title_blog') ?></h1>
                <p class="hero description "><?php echo Helpers::get($fields, 'description_blog') ?></p>
            </div>
        </section>
        <section class="blog-posts block-container">
            <?php
            if ($query) {
                while ($query->have_posts()) {
                    $query->the_post();
                    ?>
                    <div class="blog-single-block">
                        <div class="blog-block-img"><?php echo get_the_post_thumbnail($query->post->ID, ['525', '355'])?></div>
                        <div class="blog-block-content">
                            <span><?php echo get_field('subtitle', $query->post->ID) ?></span>
                            <h4><?php echo get_the_title($query->post->ID)?></h4>
                            <p><?php echo get_field('description', $query->post->ID)?></p>
                            <a class="main-link" href="<?php echo get_permalink($query->post->ID)?>"><?php _e('naar artikel', 'oesterz');?></a>
                        </div>
                    </div>

                <?php }
            }
            ?>
        </section>
        <section class="pagination-blog block-container">
            <div class="pagination-blog-content">
                <?php echo paginate_links([
                    'current'   => $currentPage,
                    'total'     => $query->max_num_pages,
                    'prev_next' => false,
                    'prev_text' => '<',
                    'next_text' => '>',
                ]); ?>
            </div>
        </section>
    </main>

<?php
get_footer();
