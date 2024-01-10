<?php
$title = get_sub_field('title');
$linkText = get_sub_field('link_text');
$linkArchiveText = get_sub_field('all_news_link_text');
$backgroundColor = get_sub_field('background_color');
$postType = get_sub_field('post_type');
$chooseNews = get_sub_field('choose_news');
$imgPosition = get_sub_field('img_position');
$postPerPage = 1;
$postNews = 'news';
$textColor = get_sub_field('text_color');
$query = new WP_Query(marketsquare_main_args($postNews, $postPerPage, $postType, [$chooseNews]));

?>

<section class="sticky-news__module <?php echo $textColor == 1 ? 'white' : 'black' ?>">
    <div class="container-fluid max-width">
        <div class="sticky-news__item-wrapper" <?php echo $backgroundColor ? 'style="background-color:' . $backgroundColor . '"' : '' ?>>
            <?php while ($query->have_posts()) {
                $query->the_post(); ?>
                <?php
                $shortDesc = get_field('short_description', $query->post->ID);
                $imageHomePage = get_field('additional_picture_format', $query->post->ID);
                $imageHomePageWebp = get_field('additional_picture_format_webp', $query->post->ID);
                $image = $imageHomePage ? $imageHomePage['sizes']['sticky-news'] : '';
                $imageWeb = $imageHomePageWebp ? $imageHomePageWebp['sizes']['sticky-news'] : '';
                ?>
                <div class="sticky-news__img-wrapper">
                    <a href="<?php echo get_permalink($query->post->ID) ?>">
                        <?php get_template_part_var('templates/parts/picture', ['imageWeb' => $imageWeb, 'image' => $image]); ?>
                    </a>
                </div>
                <div class="sticky-news__content-wrapper" <?php echo $imgPosition === 'right' ? 'style="order:-1"' : '' ?>>
                    <h5 class="sticky-news__module-title"><?php echo $title ? $title : '' ?></h5>
                    <a class="sticky-news__item-title" href="<?php the_permalink() ?>">
                        <h2><?php the_title() ?></h2>
                    </a>
                    <p class="sticky-news__desc"><?php echo $shortDesc ? $shortDesc : '' ?></p>
                    <a class="sticky-news__link link-arrow-white" href="<?php the_permalink() ?>">
                        <?php echo $linkText ? $linkText : '' ?>
                        <?php get_template_part_var('templates/parts/arrow'); ?>
                    </a>
                    <a class="sticky-news__archive-link link-arrow-white" href="<?php echo get_post_permalink('538'); ?>">
                        <?php echo $linkArchiveText ? $linkArchiveText : '' ?>
                        <?php get_template_part_var('templates/parts/arrow'); ?>
                    </a>
                </div>
            <?php }
            wp_reset_query(); ?>
        </div>
    </div>
</section>
