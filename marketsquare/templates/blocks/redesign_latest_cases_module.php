<?php
$textColor = get_sub_field('text_color');
$latestCases = get_sub_field('choose_cases');
$moduleTitle = get_sub_field('module_title');
$mobImage = get_sub_field('mobile_image');
$showAllCases = get_sub_field('show_all_cases');
$allCases = get_sub_field('all_cases');
$singlePost = get_sub_field('choose_post');
$post_per_page = -1;
$postType = 'cases';


$changeHeight = get_sub_field('change_module_height');
$marginTopDesktop = $changeHeight['margin_top_desktop'] ? ' margin-desktop-top="'. $changeHeight['margin_top_desktop'] .'px" ' : '';
$marginBottomDesktop = $changeHeight['margin_bottom_desktop'] ? ' margin-desktop-bottom="'. $changeHeight['margin_bottom_desktop'] .'px" ' : '';

$marginTopTablet = $changeHeight['margin_top_tablet'] ? ' margin-tablet-top="'. $changeHeight['margin_top_tablet'] .'px" ' : '';
$marginBottomTablet = $changeHeight['margin_bottom_tablet'] ? ' margin-tablet-bottom="'. $changeHeight['margin_bottom_tablet'] .'px" ' : '';

$marginTopMobile = $changeHeight['margin_top_mobile'] ? ' margin-mobile-top="'. $changeHeight['margin_top_mobile'] .'px" ' : '';
$marginBottomMobile = $changeHeight['margin_bottom_mobile'] ? ' margin-mobile-bottom="'. $changeHeight['margin_bottom_mobile'] .'px" ' : '';

?>


<section class="latest-cases__module redesign-latest-cases__module resize-module <?php echo $textColor == 1 ? 'white' : '' ?>" <?php echo $marginTopDesktop;?> <?php echo $marginBottomDesktop?><?php echo $marginTopTablet;?> <?php echo $marginBottomTablet?><?php echo $marginTopMobile;?> <?php echo $marginBottomMobile?>>
    <div class="container-fluid max-width">
        <div class="latest-cases__header">
            <?php if ($moduleTitle): ?>
                <h2 class="latest-cases__module__title msq-body"><?php echo $moduleTitle ?></h2>
            <?php endif; ?>

            <?php if ($showAllCases): ?>
                <div class="latest-cases__all-link-wrapper">
                    <a class="latest-cases__all-link link-arrow msq-body" href="<?php echo get_post_permalink('285'); ?>">
                        <?php echo $allCases; ?>
                        <?php get_template_part_var('templates/parts/redesign-arrow'); ?>
                    </a>
                    <span class="all-cases__counter msq-body">(<?php
                        $argsAll = ['post_type' => $postType, 'posts_per_page' => -1, 'post_status' => 'publish'];
                        $queryAll = new WP_Query($argsAll);
                        echo $queryAll->post_count;
                        ?>)</span>
                </div>
            <?php endif; ?>
        </div>
        <div class="latest-cases__wrapper  redesign">
            <?php
            $query = new WP_Query(redesign_marketsquare_main_args($postType, $post_per_page, $latestCases));

            while ($query->have_posts()) {
                $query->the_post();
                $imgSize = false;
                get_template_part_var('templates/parts/redesign-single-case', ['query' => $query, 'imgSize' => $imgSize, 'addSize' => $imgSize]);
                ?>
            <?php }
            wp_reset_query(); ?>
        </div>
    </div>
</section>

