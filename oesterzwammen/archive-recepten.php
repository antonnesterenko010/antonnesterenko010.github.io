<?php
get_header();

$fields = get_fields('options');

use ThemeOptions\Helpers;

$currentPage = get_query_var('paged') ? get_query_var('paged') : 1;
$post_per_page = get_option('posts_per_page');
$args = [
    'post_type' => 'recepten',
    'paged' => $currentPage,
    'posts_per_page' => $post_per_page,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
];
$query = new WP_Query($args);

?>

    <main class="page-recepten">
        <section class="hero-module-block"
                 style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%), linear-gradient(0deg, rgba(203, 187, 157, 0.50) 0%, rgba(203, 187, 157, 0.50) 100%), url('<?php echo wp_get_attachment_image_url(Helpers::get($fields, 'background_recepes'), 'full'); ?>') no-repeat 50% center/cover lightgray;">
            <span class="hero-bg"></span>
            <div class="block-container">
                <h1 class="home-title"><?php echo Helpers::get($fields, 'title_recepes') ?></h1>
                <p class="hero description "><?php echo Helpers::get($fields, 'description_recepes') ?></p>
            </div>
        </section>
        <section class="recepten-posts block-container">
            <img class="opacity-bg-image"
                 src="<?php echo get_template_directory_uri() . '/dest/images/bg-image-opacity.png' ?>">
            <?php
            $key = 1;
            if ($query) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $size = ['525', '440'];

                    if ($key == 2 ){
                        $size = ['462', '464'];
                    }elseif ($key == 3 ){
                        $size = ['596', '464'];
                    }
                    if ($key == 1){
                        echo '<div class="first-row">';
                        $size = ['1079', '480'];
                    }elseif ($key == 2){
                        echo '<div class="second-row">';
                    }elseif ($key == 4){
                        echo '<div class="third-row">';
                        echo '<div class="third-sub-block-row">';
                        echo '<div class="third-first-row">';
                    }elseif ($key == 6){
                        echo '<div class="third-second-row">';
                    }
                    ?>
                    <div class="recepten-single-block">
                        <a href="<?php echo get_permalink($query->post->ID) ?>">
                            <div class="resepten-block-img"><?php echo get_the_post_thumbnail($query->post->ID, $size) ?></div>
                            <h4><?php echo get_the_title($query->post->ID) ?></h4>
                        </a>
                    </div>

                    <?php
                    if ($key == 1 || $key == 3){
                        echo '</div>' ;
                    }elseif ($key == 5){
                        echo '</div>';
                    }elseif ($key == 6){
                        echo '</div>';
                        echo '</div>';

                    } elseif ($key == 7){
                        echo '</div>';
                    }
                    $key++;

                }
            }
            ?>
        </section>
        <section class="pagination-blog block-container">
            <div class="pagination-blog-content">
                <?php echo paginate_links([
                    'current' => $currentPage,
                    'total' => $query->max_num_pages,
                    'prev_next' => false,
                    'prev_text' => '<',
                    'next_text' => '>',
                ]); ?>
            </div>
        </section>
    </main>

<?php
get_footer();
