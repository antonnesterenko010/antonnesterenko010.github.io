<?php
$textColor = get_sub_field('text_color');
$post_per_page = 3;
$postType = 'news';
$latestNews = get_sub_field('choose_news');
$allNews = get_sub_field('all_news');
$chooseNewsType = get_sub_field('choose_news_select');
$offsetTop = get_sub_field('offset_top');
$margin = get_sub_field('margin_bottom');
$query = new WP_Query(marketsquare_main_args($postType, $post_per_page, $chooseNewsType, $latestNews));

?>

<section class="latest-news__module" <?php echo 'style="margin-bottom:' . $margin . 'px"' ?>>
    <div class="container-fluid max-width">
        <div class="latest-news__wrapper <?php echo $textColor == 1 ? 'white' : '' ?>">
            <p class="latest-news__title"><?php echo $allNews ? $allNews : '' ?></p>
            <div class="latest-news__content-wrapper">
                <?php while ($query->have_posts()) {
                    $query->the_post();
                    $imgSize = 'latest-cases';
                    get_template_part_var('templates/parts/single-case-old', ['query' => $query, 'imgSize' => $imgSize, 'addSize' => 'news-additional']);
                    ?>
                <?php }
                wp_reset_query(); ?>
            </div>
        </div>
    </div>
</section>
