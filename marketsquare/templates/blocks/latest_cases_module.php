<?php
$textColor = get_sub_field('text_color');
$latestCases = get_sub_field('choose_cases');
$moduleTitle = get_sub_field('module_title');
$mobImage = get_sub_field('mobile_image');
$showAllCases = get_sub_field('show_all_cases');
$allCases = get_sub_field('all_cases');
$chooseCasesType = get_sub_field('choose_cases_select');
$offsetTop = get_sub_field('offset_top');
$singlePost = get_sub_field('choose_post');
$post_per_page = $chooseCasesType == 'single' ? 1 : 3;
$postType = 'cases';
$query = new WP_Query(marketsquare_main_args($postType, $post_per_page, $chooseCasesType, $latestCases));
?>


<section class="latest-cases__module <?php echo $textColor == 1 ? 'white' : '' ?>">
    <div class="container-fluid max-width">
        <?php if ($moduleTitle): ?>
            <h2 class="latest-cases__module__title"><?php echo $moduleTitle ?></h2>
        <?php endif; ?>
        <?php if ($chooseCasesType == 'single'): ?>
            <div class="latest-cases__wrapper single <?php echo $offsetTop ? 'offset-top' : '' ?>">
                <?php
                $imgSize = 'full';
                get_template_part_var('templates/parts/single-case-one', ['mob' => $mobImage, 'id' => $singlePost, 'imgSize' => $imgSize, 'addSize' => $imgSize]);
                ?>
            </div>
        <?php else: ?>
            <div class="latest-cases__wrapper  <?php echo $offsetTop ? 'offset-top' : '' ?>">
                <?php while ($query->have_posts()) {
                    $query->the_post();
                    $imgSize = 'latest-cases';
                    get_template_part_var('templates/parts/single-case-old', ['query' => $query, 'imgSize' => $imgSize, 'addSize' => $imgSize]);
                    ?>
                <?php }
                wp_reset_query(); ?>
            </div>
        <?php endif; ?>
        <?php if ($showAllCases): ?>
            <div class="latest-cases__all-link-wrapper">
                <a class="latest-cases__all-link link-arrow" href="<?php echo get_post_permalink('285'); ?>">
                    <?php echo $allCases; ?>
                    <?php get_template_part_var('templates/parts/arrow'); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

