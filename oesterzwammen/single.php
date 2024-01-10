<?php
get_header();

global $post;

$fields = get_fields();

use ThemeOptions\Helpers;

$args = [
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'post__not_in' => array( $post->ID )

];
$query = new WP_Query($args);

?>

    <main class="blog-single-page">

        <section class="hero-module-block"
                 style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%), linear-gradient(0deg, rgba(203, 187, 157, 0.50) 0%, rgba(203, 187, 157, 0.50) 100%), url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>') no-repeat 50% center/cover lightgray;">
            <span class="hero-bg"></span>
            <div class="block-container">
                <h1 class="home-title"><?php the_title() ?></h1>
                <p class="hero description "><?php echo Helpers::get($fields, 'description') ?></p>
            </div>
        </section>
        <section class="single-block-main block-container">
            <img class="opacity-bg-image"
                 src="<?php echo get_template_directory_uri() . '/dest/images/bg-image-opacity.png' ?>">
            <div class="single-block-left">

                <h2 class="single-blog-subtitle"><?php echo Helpers::get($fields, 'subtitle') ?></h2>
                <?php
                while (have_posts()) :
                    the_post();

                    the_content();

                endwhile;
                ?>
            </div>
            <div class="single-block-right">
                <h2 class="single-blog-subtitle"><?php _e('RECENTE BERICHTEN', 'oesterz'); ?></h2>
                <div class="relative-posts-block">
                    <?php
                    if ($query) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            ?>
                            <div class="blog-single-block">

                                <div class="blog-block-img"><a href="<?php echo get_permalink($query->post->ID) ?>"><?php echo get_the_post_thumbnail($query->post->ID, ['127', '85']) ?></a></div>

                                <div class="blog-block-content">
                                    <a href="<?php echo get_permalink($query->post->ID) ?>">
                                        <h4><?php echo get_the_title($query->post->ID) ?></h4>
                                    </a>
                                    <p><?php echo get_field('description', $query->post->ID) ?></p>

                                </div>
                            </div>

                        <?php }
                    }
                    ?>
                </div>
            </div>
        </section>
        <section class="team-section block-container">
            <div class="swiper">
                <div class="team-block swiper-wrapper">
                    <?php foreach (Helpers::get($fields, 'slider_image') as $image) { ?>
                        <div class="single-team swiper-slide">
                            <a href="<?php echo $image['link'] ?>">
                                <?php echo wp_get_attachment_image($image['image'], 'full') ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

    </main>

<?php
get_footer();
